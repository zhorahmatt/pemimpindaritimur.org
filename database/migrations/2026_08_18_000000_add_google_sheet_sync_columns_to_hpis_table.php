<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hpis', function (Blueprint $table) {
            $table->timestamp('google_sheet_synced_at')->nullable()->after('status');
            $table->unsignedInteger('google_sheet_row')->nullable()->after('google_sheet_synced_at');
            $table->text('google_sheet_sync_error')->nullable()->after('google_sheet_row');
        });
    }

    public function down(): void
    {
        Schema::table('hpis', function (Blueprint $table) {
            $table->dropColumn([
                'google_sheet_synced_at',
                'google_sheet_row',
                'google_sheet_sync_error',
            ]);
        });
    }
};
