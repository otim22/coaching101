<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;

class TeacherFilterController extends Controller
{
    protected function getLevelsToStandard($value = 'Select standard')
    {
        return ItemContent::getLevelsToStandard($value);
    }

    protected function getYearsToLevel($value = 'Select level')
    {
        return ItemContent::getYearsToLevel($value);
    }

    protected function getRightCurrency($value = 'Select standard')
    {
        return ItemContent::getRightCurrency($value);
    }

    protected function getCoursesOfACategory($value = 'Select category')
    {
        return ItemContent::getCoursesOfACategory($value);
    }
}
