<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'booking_id',
        'transaction_date',
        'transaction_discount',
        'transaction_amount',
        'transaction_status',
    ];
    
    protected $with = ['booking'];

    public function booking() {
        return $this->hasOne(Booking::class, 'booking_id', 'booking_id');
    }
}
