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
        Schema::table('students', function (Blueprint $table) {
            $table->string('birthday_place_en')->nullable();
            $table->string('phone_number_earth')->nullable();
            $table->string('known1')->nullable();
            $table->string('phone_number_known1')->nullable();
            $table->string('known2')->nullable();
            $table->string('phone_number_known2')->nullable();
            $table->enum('place_address', ['Amman', 'Irbid', 'Aqaba', 'Zarqa', 'Other'])->nullable();
            $table->enum('place_give', ['yes', 'no'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
