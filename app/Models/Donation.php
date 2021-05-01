<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['sponsor_name', 'sponsor_email', 'sponsee_name', 'sponsee_email', 'interval', 'currency', 'duration', 'amount'];

    public function getFormatAmountAttribute()
    {
        return rtrim(rtrim(number_format($this->amount, 2), 2), '.');
    }
}
