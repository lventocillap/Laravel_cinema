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

    public function Sale()
    {
        return $this->hasOne(Sale::class);
    }

    public function Billboard()
    {
        return $this->hasOne(Billboard::class);
    }

    public function Seat(){
        return $this->hasOne(Seat::class);
    }
}
