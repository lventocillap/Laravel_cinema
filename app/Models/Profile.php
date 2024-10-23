<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'document_number',
        'cellphone',
        'email_verification',
        'name',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    } 
    public function sale()
    {
        return $this->hasMany(Sale::class,'client_id');
    }
}
