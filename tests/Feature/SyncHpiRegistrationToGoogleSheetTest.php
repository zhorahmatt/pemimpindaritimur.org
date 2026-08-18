<?php

namespace Tests\Feature;

use App\Contracts\HpiRegistrationSheet;
use App\Jobs\SyncHpiRegistrationToGoogleSheet;
use App\Models\Hpi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use RuntimeException;
use Tests\TestCase;

class SyncHpiRegistrationToGoogleSheetTest extends TestCase
{
    use RefreshDatabase;

    public function test_job_marks_registration_as_synced(): void
    {
        $hpi = Hpi::create($this->registrationData());
        $sheet = new class implements HpiRegistrationSheet
        {
            public int $calls = 0;

            public function sync(Hpi $hpi): ?int
            {
                $this->calls++;

                return 12;
            }
        };

        (new SyncHpiRegistrationToGoogleSheet($hpi->id))->handle($sheet);

        $hpi->refresh();

        $this->assertSame(1, $sheet->calls);
        $this->assertNotNull($hpi->google_sheet_synced_at);
        $this->assertSame(12, $hpi->google_sheet_row);
        $this->assertNull($hpi->google_sheet_sync_error);
    }

    public function test_job_skips_a_registration_that_is_already_synced(): void
    {
        $hpi = Hpi::create(array_merge($this->registrationData(), [
            'google_sheet_synced_at' => now(),
            'google_sheet_row' => 8,
        ]));
        $sheet = new class implements HpiRegistrationSheet
        {
            public int $calls = 0;

            public function sync(Hpi $hpi): ?int
            {
                $this->calls++;

                return null;
            }
        };

        (new SyncHpiRegistrationToGoogleSheet($hpi->id))->handle($sheet);

        $this->assertSame(0, $sheet->calls);
    }

    public function test_job_records_the_error_and_rethrows_for_queue_retry(): void
    {
        $hpi = Hpi::create($this->registrationData());
        $sheet = new class implements HpiRegistrationSheet
        {
            public function sync(Hpi $hpi): ?int
            {
                throw new RuntimeException('Google Sheets is unavailable.');
            }
        };

        try {
            (new SyncHpiRegistrationToGoogleSheet($hpi->id))->handle($sheet);
            $this->fail('The job should rethrow the synchronization error.');
        } catch (RuntimeException $exception) {
            $this->assertSame('Google Sheets is unavailable.', $exception->getMessage());
        }

        $hpi->refresh();

        $this->assertNull($hpi->google_sheet_synced_at);
        $this->assertSame('Google Sheets is unavailable.', $hpi->google_sheet_sync_error);
    }

    public function test_reconciliation_command_queues_only_unsynced_registrations(): void
    {
        Queue::fake();
        $unsynced = Hpi::create($this->registrationData());
        Hpi::create(array_merge($this->registrationData(), [
            'email' => 'synced@example.com',
            'google_sheet_synced_at' => now(),
        ]));

        $this->artisan('hpi:sync-google-sheet')
            ->expectsOutput('Queued 1 HPI registration(s) for Google Sheets synchronization.')
            ->assertSuccessful();

        Queue::assertPushed(
            SyncHpiRegistrationToGoogleSheet::class,
            fn (SyncHpiRegistrationToGoogleSheet $job) => $job->hpiId === $unsynced->id,
        );
        Queue::assertPushed(SyncHpiRegistrationToGoogleSheet::class, 1);
    }

    private function registrationData(): array
    {
        return [
            'name' => 'Peserta Uji',
            'email' => 'peserta@example.com',
            'whatsapp' => '08123456789',
            'city' => 'Makassar',
            'size' => 'L',
            'business_name' => 'Perusahaan Uji',
            'business_field' => 'Teknologi',
            'position' => 'Manager',
            'problem' => 'Tantangan uji',
            'hope' => 'Harapan uji',
            'from' => 'Website',
        ];
    }
}
