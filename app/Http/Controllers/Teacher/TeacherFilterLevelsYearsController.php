<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Year;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherFilterLevelsYearsController extends Controller
{
    protected function getLevelsToStandard($value = 'Select standard')
    {
        if($value == 'Select standard') {
            return Level::get();
        } else {
            return  Level::where('standard_id', $value)->get();
        }
    }

    protected function getYearsToLevel($value = 'Select level')
    {
        if($value == 'Select level') {
            return Year::get();
        } else {
            return  Year::where('level_id', $value)->get();
        }
    }
}
