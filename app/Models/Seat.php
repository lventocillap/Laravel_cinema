<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'room_id',
        'nro_seat',
        'status_id'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
    public function detailSale()
    {
        return $this->hasMany(DetailSale::class, 'seat_id');
    }
    public function status()
    {
        return $this->belongsTo(Seat::class,'status_id');
    }
}
