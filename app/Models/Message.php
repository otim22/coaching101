<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['welcome_message', 'congragulation_message'];

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
