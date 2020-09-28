<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectOutline extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_title', 'content_file', 'content_description', 'resource_attachment'
    ];
}
