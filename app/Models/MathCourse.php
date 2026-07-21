<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MathCourse extends Model
{
    protected $fillable = [
        'academic_year',
        'name',
    ];

    public function mathScores(): HasMany
    {
        return $this->hasMany(StudentMathScore::class);
    }
}
