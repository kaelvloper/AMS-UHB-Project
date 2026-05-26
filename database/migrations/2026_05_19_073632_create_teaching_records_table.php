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
        Schema::create('teaching_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lecturer_id')->constrained('lecturers')->onDelete('cascade');
            $table->string('course_name');
            $table->string('semester');
            $table->date('date')->nullable();
            $table->integer('credit_hours');
            $table->string('uts_method')->default('CBT');
            $table->integer('uts_student_count')->default(0);
            $table->string('uas_method')->default('CBT');
            $table->integer('uas_student_count')->default(0);
            $table->text('material')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_records');
    }
};
