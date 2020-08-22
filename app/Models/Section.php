<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'content_title', 'main_content_files', 'content_description','extra_resource_files'
    ];

    /**
     * Get the course that owns the section.
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
