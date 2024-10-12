<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'imageble_type',
        'imageble_id',
        'url'
    ];

    public function imageble()
    {
        return $this->morphTo();
    }
}
