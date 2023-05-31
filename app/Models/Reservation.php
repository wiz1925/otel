<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function hotel()
    {
        return $this->hasOne(Hotel::class, 'id', 'hotel_id');
    }
}
