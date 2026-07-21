<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentMathScore extends Model
{
    protected $fillable = [
        'student_id',
        'math_course_id',
        'year',
        'semester',
        'score',
        'assessed_at',
    ];

    protected $casts = [
        'assessed_at' => 'date',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function mathCourse(): BelongsTo
    {
        return $this->belongsTo(MathCourse::class);
    }
}
