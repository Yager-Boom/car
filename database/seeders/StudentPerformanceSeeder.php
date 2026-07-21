<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\MathCourse;
use App\Models\StudentMathScore;
use Carbon\Carbon;

class StudentPerformanceSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['name' => '王小明', 'class_name' => '一年甲班'],
            ['name' => '李小華', 'class_name' => '一年乙班'],
            ['name' => '陳怡君', 'class_name' => '一年甲班'],
            ['name' => '林志豪', 'class_name' => '一年乙班'],
            ['name' => '張雅婷', 'class_name' => '一年甲班'],
        ];

        $courses = [
            2021 => '代數入門',
            2022 => '幾何進階',
            2023 => '微積分基礎',
            2024 => '機率與統計',
            2025 => '線性代數',
        ];

        $studentModels = [];
        foreach ($students as $student) {
            $studentModels[] = Student::firstOrCreate(['name' => $student['name']], $student);
        }

        $courseModels = [];
        $academicYear = 1;
        foreach ($courses as $year => $name) {
            $courseModels[$year] = MathCourse::firstOrCreate(
                ['academic_year' => $academicYear],
                ['name' => $name]
            );
            $academicYear++;
        }

        $scores = [
            '王小明' => [72, 75, 78, 80, 82, 84, 86, 88, 90, 91],
            '李小華' => [88, 86, 84, 82, 80, 79, 78, 77, 76, 75],
            '陳怡君' => [65, 70, 68, 72, 75, 78, 80, 83, 85, 87],
            '林志豪' => [90, 92, 91, 90, 89, 88, 86, 85, 84, 83],
            '張雅婷' => [78, 80, 82, 85, 83, 86, 88, 90, 92, 94],
        ];

        $years = [2021, 2022, 2023, 2024, 2025];

        foreach ($studentModels as $student) {
            $studentScores = $scores[$student->name];
            $index = 0;

            foreach ($years as $year) {
                foreach ([1, 2] as $semester) {
                    $score = $studentScores[$index] ?? 0;
                    $assessedAt = Carbon::create($year, $semester === 1 ? 6 : 12, 30);

                    StudentMathScore::firstOrCreate(
                        [
                            'student_id' => $student->id,
                            'math_course_id' => $courseModels[$year]->id,
                            'year' => $year,
                            'semester' => $semester,
                        ],
                        [
                            'score' => $score,
                            'assessed_at' => $assessedAt,
                        ]
                    );

                    $index++;
                }
            }
        }
    }
}
