<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectOutline extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_title', 'content_file_path', 'content_description'
    ];

    protected $casts = [
        'resource_attachment_path' => 'array'
    ];
}
