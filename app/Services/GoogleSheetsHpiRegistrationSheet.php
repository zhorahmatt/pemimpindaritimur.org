<?php

namespace App\Services;

use App\Contracts\HpiRegistrationSheet;
use App\Models\Hpi;
use Google\Client as GoogleClient;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;
use JsonException;
use RuntimeException;

class GoogleSheetsHpiRegistrationSheet implements HpiRegistrationSheet
{
    private const HEADERS = [
        'Sync Key',
        'Registration ID',
        'Registration Date',
        'Name',
        'Email',
        'WhatsApp',
        'City',
        'Shirt Size',
        'Business/Organization',
        'Business Field',
        'Position',
        'Problem',
        'Hope',
        'Information Source',
        'Status',
    ];

    public function sync(Hpi $hpi): ?int
    {
        $spreadsheetId = (string) config('services.google_sheets.spreadsheet_id');
        $sheetName = (string) config('services.google_sheets.hpi_sheet');

        if ($spreadsheetId === '' || $sheetName === '') {
            throw new RuntimeException('Google Sheets spreadsheet ID or HPI sheet name is not configured.');
        }

        $service = new Sheets($this->googleClient());
        $quotedSheetName = "'".str_replace("'", "''", $sheetName)."'";
        $keyRange = "{$quotedSheetName}!A:A";
        $keyResponse = $service->spreadsheets_values->get($spreadsheetId, $keyRange, [
            'majorDimension' => 'COLUMNS',
        ]);
        $keys = $keyResponse->getValues()[0] ?? [];
        $syncKey = self::syncKey($hpi);
        $existingIndex = array_search($syncKey, $keys, true);

        if ($existingIndex !== false) {
            return $existingIndex + 1;
        }

        if ($keys === []) {
            $service->spreadsheets_values->update(
                $spreadsheetId,
                "{$quotedSheetName}!A1:O1",
                new ValueRange(['values' => [self::HEADERS]]),
                ['valueInputOption' => 'RAW'],
            );
        }

        $result = $service->spreadsheets_values->append(
            $spreadsheetId,
            "{$quotedSheetName}!A:O",
            new ValueRange(['values' => [self::rowFor($hpi)]]),
            [
                'insertDataOption' => 'INSERT_ROWS',
                'valueInputOption' => 'RAW',
            ],
        );

        $updatedRange = $result->getUpdates()?->getUpdatedRange();

        return is_string($updatedRange) && preg_match('/![A-Z]+(\d+):/', $updatedRange, $matches)
            ? (int) $matches[1]
            : null;
    }

    public static function rowFor(Hpi $hpi): array
    {
        return [
            self::syncKey($hpi),
            $hpi->id,
            $hpi->created_at?->format('Y-m-d H:i:s'),
            $hpi->name,
            $hpi->email,
            $hpi->whatsapp,
            $hpi->city,
            $hpi->size,
            $hpi->business_name,
            $hpi->business_field,
            $hpi->position,
            $hpi->problem,
            $hpi->hope,
            $hpi->from,
            $hpi->status,
        ];
    }

    private static function syncKey(Hpi $hpi): string
    {
        return "hpi:{$hpi->id}";
    }

    private function googleClient(): GoogleClient
    {
        $encodedCredentials = (string) config('services.google_sheets.credentials_base64');
        $decodedCredentials = base64_decode($encodedCredentials, true);

        if ($encodedCredentials === '' || $decodedCredentials === false) {
            throw new RuntimeException('Google Sheets credentials are missing or are not valid base64.');
        }

        try {
            $credentials = json_decode($decodedCredentials, true, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new RuntimeException('Google Sheets credentials do not contain valid JSON.', previous: $exception);
        }

        if (! is_array($credentials) || ($credentials['type'] ?? null) !== 'service_account') {
            throw new RuntimeException('Google Sheets credentials are not a service-account key.');
        }

        $client = new GoogleClient;
        $client->setApplicationName((string) config('app.name'));
        $client->setAuthConfig($credentials);
        $client->setScopes([Sheets::SPREADSHEETS]);

        return $client;
    }
}
