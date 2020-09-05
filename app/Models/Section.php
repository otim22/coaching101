<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'content_title', 'main_content_files', 'content_description','extra_resource_files'
    ];

    /**
     * Get the subject that owns the section.
     */
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
