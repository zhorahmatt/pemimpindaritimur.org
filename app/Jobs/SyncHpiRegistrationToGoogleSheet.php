<?php

namespace App\Jobs;

use App\Contracts\HpiRegistrationSheet;
use App\Models\Hpi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Throwable;

class SyncHpiRegistrationToGoogleSheet implements ShouldQueue
{
    use Queueable;

    public int $tries = 5;

    public int $timeout = 60;

    public function __construct(public int $hpiId) {}

    public function handle(HpiRegistrationSheet $sheet): void
    {
        $hpi = Hpi::find($this->hpiId);

        if (! $hpi || $hpi->google_sheet_synced_at) {
            return;
        }

        try {
            $row = $sheet->sync($hpi);

            $hpi->forceFill([
                'google_sheet_synced_at' => now(),
                'google_sheet_row' => $row,
                'google_sheet_sync_error' => null,
            ])->save();
        } catch (Throwable $exception) {
            $hpi->forceFill([
                'google_sheet_sync_error' => $exception->getMessage(),
            ])->save();

            throw $exception;
        }
    }

    public function backoff(): array
    {
        return [30, 120, 300, 900];
    }
}
