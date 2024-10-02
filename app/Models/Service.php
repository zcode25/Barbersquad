<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['service_id'];
    protected $primaryKey = 'service_id';

    public function booking() {
        return $this->hasMany(Booking::class);
    }
}
