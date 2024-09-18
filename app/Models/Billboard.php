<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billboard extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'movie_id',
        'room_id',
        'star_date',
        'end_date',
        'time_projection'
    ];

    public function Movie()
    {
        return $this->hasOne(Movie::class);
    }

    public function Room()
    {
        return $this->hasOne(Room::class);
    }
}
