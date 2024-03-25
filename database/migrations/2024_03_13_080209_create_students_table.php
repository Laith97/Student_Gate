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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // Full name of the student
            $table->string('college'); // Name of the college
            $table->string('payment_number'); // Payment number (assuming it's a string)
            $table->string('email')->unique(); // Email address (unique)
            $table->string('student_status'); // Status of the student (e.g., active, inactive)
            $table->text('comments')->nullable(); // Comments (nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
