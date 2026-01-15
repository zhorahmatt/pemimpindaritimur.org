<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('minauts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('whatsapp');
            $table->string('city');
            $table->string('size');
            $table->string('business_name');
            $table->string('business_field');
            $table->string('position');
            $table->text('problem');
            $table->text('hope');
            $table->string('from');
            // $table->string('image');
            $table->enum('status', ['pending', 'deny', 'accept'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minauts');
    }
};
