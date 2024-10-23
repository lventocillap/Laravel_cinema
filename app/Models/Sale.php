<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'date',
        'total_price'
    ];

    public function client()
    {
        return $this->belongsTo(Profile::class, 'client_id');
    }

    public function detailSale()
    {
        return $this->hasMany(DetailSale::class, 'sale_id');
    }
}
