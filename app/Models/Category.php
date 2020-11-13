<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    /**
    * Get the subjects for the category.
    */
   public function subjects()
   {
       return $this->hasMany('App\Models\Subject');
   }
}
