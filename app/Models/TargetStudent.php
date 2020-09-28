<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetStudent extends Model
{
    use HasFactory;

    protected $fillable = ['student_learn', 'class_requirement', 'target_student'];

    protected $casts = [
            'student_learn' => 'array',
            'class_requirement' => 'array',
            'target_student' => 'array'
    ];
}
