<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'capacity',
        'statuses_id'
    ];

    public function roomStatuses()
    {
        return $this->belongsTo(Room_statuses::class, 'statuses_id');
    }
    public function billboard()
    {
        return $this->hasMany(Billboard::class, 'billboard_id');
    }
    public function seat()
    {
        return $this->hasMany(Room::class, 'room_id');
    }
}
