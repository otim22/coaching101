<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'item_content_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function itemContent()
    {
        return $this->belongsTo('App\Models\ItemContent');
    }
}
