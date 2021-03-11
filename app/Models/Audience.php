<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;

    protected $fillable = ['student_learn', 'class_requirement', 'target_student'];
    protected $casts = [
        'student_learn' => 'array',
        'class_requirement' => 'array',
        'target_student' => 'array'
    ];

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
