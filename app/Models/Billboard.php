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

    public function movie()
    {
        return $this->belongsTo(Movie::class,'movie_id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function detailSale()
    {
        return $this->hasMany(DetailSale::class, 'billboard_id');
    }
}
