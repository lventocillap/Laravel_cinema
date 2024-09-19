<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailSale extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'sale_id',
        'billboard_id',
        'seat_id',
        'price',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    public function billboard()
    {
        return $this->belongsTo(Billboard::class, 'billboard_id');
    }
    public function seat()
    {
        return $this->belongsTo(Seat::class,'seat_id');
    }
}
