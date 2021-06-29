<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [ 'rating', 'comment', 'user_id', 'subject_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
