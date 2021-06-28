<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationPayment extends Model
{
    use HasFactory;

    protected $fillable = ['interval', 'currency', 'duration', 'amount'];

    /**
     * Get the user who donated.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\DonationUser', 'donation_user_id');
    }

    public function getFormatAmountAttribute()
    {
        return rtrim(rtrim(number_format($this->amount, 2), 2), '.');
    }
}
