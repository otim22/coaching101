<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectMessage extends Model
{
    use HasFactory;

    protected $fillable = ['welcome_message', 'congragulation_message'];
}
