<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSurveyAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['survey_answer_id', 'standard_id', 'user_id'];
    protected $table = 'user_answers';
}
