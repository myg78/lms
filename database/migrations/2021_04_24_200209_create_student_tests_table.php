<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('test_id');
            $table->integer('attempt_number');
            $table->string('submission_status');
            $table->timestampTz('start_date')->nullable();
            $table->timestampTz('submission_date')->nullable();
            $table->string('grading_status')->nullable();
            $table->timestampTz('graded_date')->nullable();
            $table->string('graded_by')->nullable();
            $table->integer('grade_value')->nullable();
            $table->integer('grade_max_value')->nullable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_tests');
    }
}
