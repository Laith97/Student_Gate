<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->date('datebirth')->nullable();
            $table->string('full_name_english')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('address')->nullable();
            $table->string('jordan_phone_number')->nullable();
            $table->string('second_phone_number')->nullable();
            $table->enum('level_educational_dad', ['High School', 'College', 'Bachelor', 'Master', 'Doctor'])->nullable();
            $table->enum('level_educational_mom', ['High School', 'College', 'Bachelor', 'Master', 'Doctor'])->nullable();
            $table->string('full_address')->nullable();
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'datebirth',
                'full_name_english',
                'birth_city',
                'address',
                'jordan_phone_number',
                'second_phone_number',
                'level_educational_dad',
                'level_educational_mom',
                'full_address',
            ]);
        });
    }
}
