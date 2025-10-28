<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ilmu_keuangans', function (Blueprint $table) {
            if (!Schema::hasColumn('ilmu_keuangans', 'image')) {
                $table->string('image')->nullable()->after('from');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ilmu_keuangans', function (Blueprint $table) {
            if (Schema::hasColumn('ilmu_keuangans', 'image')) {
                $table->dropColumn('image');
            }
        });
    }
};
