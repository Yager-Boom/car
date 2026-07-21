<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_math_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('math_course_id')->constrained('math_courses')->cascadeOnDelete();
            $table->unsignedSmallInteger('year');
            $table->unsignedTinyInteger('semester');
            $table->unsignedTinyInteger('score');
            $table->date('assessed_at');
            $table->timestamps();

            $table->index(['year', 'semester']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_math_scores');
    }
};
