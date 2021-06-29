<?php

namespace App\Models;

use App\Traits\SelfReferenceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, SelfReferenceTrait;

    protected $fillable = ['title', 'parent_id'];
}
