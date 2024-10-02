<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barberman extends Model
{
    use HasFactory;

    protected $guarded = ['barberman_id'];
    protected $primaryKey = 'barberman_id';

    public function booking() {
        return $this->hasMany(Booking::class);
    }
}
