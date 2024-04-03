<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('semester_hours')->nullable()->change();
            $table->string('semester_average')->nullable()->change();
            $table->string('cumulative_hours')->nullable()->change();
            $table->string('cumulative_average')->nullable()->change();
            $table->string('sm_success')->nullable()->change();
            $table->string('indicator')->nullable()->change();
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
