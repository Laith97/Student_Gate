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
            $table->integer('semester_hours')->nullable();
            $table->decimal('semester_average', 5, 2)->nullable();
            $table->integer('cumulative_hours')->nullable();
            $table->decimal('cumulative_average', 5, 2)->nullable();
            $table->boolean('sm_success')->nullable();
            $table->string('indicator')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'semester_hours',
                'semester_average',
                'cumulative_hours',
                'cumulative_average',
                'sm_success',
                'indicator',
            ]);
        });
    }
};
