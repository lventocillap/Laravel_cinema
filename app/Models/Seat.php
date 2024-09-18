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
        'status'
    ];

    public function Room()
    {
        return $this->hasOne(Room::class);
    }
}
