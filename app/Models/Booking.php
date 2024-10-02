<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'customer_id',
        'barberman_id',
        'service_id',
        'booking_status',
    ];
    
    protected $with = ['user', 'barberman', 'service'];

    public function user(){
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function barberman(){
        return $this->belongsTo(Barberman::class, 'barberman_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function transaction() {
        return $this->hasOne(Transaction::class, 'transaction_id', 'transaction_id');
    }
}
