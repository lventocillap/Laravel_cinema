<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes; // Asegúrate de usar HasFactory si estás usando factory

    protected $fillable = [
        'title',
        'gender',
        'time',
        'premiere',
        'status_id'
    ];

    public function movieStatus()
    {
        return $this->belongsTo(Movie_statuses::class, 'status_id');
    }
}
