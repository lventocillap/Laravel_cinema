<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class PersonalAccessToken extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens;

    protected $fillable = [
        'name',
        'token',
        'abilities',
        'expires_at',
        'tokeneable_id',
        'tokeneable_type',
    ];
}
