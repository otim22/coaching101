<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['answer', 'survey_question_id'];

    public function question()
    {
        return $this->belongsTo('App\Models\SurveyQuestion', 'survey_question_id');
    }
}
