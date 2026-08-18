<?php

namespace App\Console\Commands;

use App\Jobs\SyncHpiRegistrationToGoogleSheet;
use App\Models\Hpi;
use Illuminate\Console\Command;

class SyncHpiRegistrationsToGoogleSheet extends Command
{
    protected $signature = 'hpi:sync-google-sheet';

    protected $description = 'Queue unsynced HPI registrations for Google Sheets synchronization';

    public function handle(): int
    {
        $queued = 0;

        Hpi::query()
            ->whereNull('google_sheet_synced_at')
            ->select('id')
            ->chunkById(100, function ($registrations) use (&$queued): void {
                foreach ($registrations as $registration) {
                    SyncHpiRegistrationToGoogleSheet::dispatch($registration->id);
                    $queued++;
                }
            });

        $this->info("Queued {$queued} HPI registration(s) for Google Sheets synchronization.");

        return self::SUCCESS;
    }
}
