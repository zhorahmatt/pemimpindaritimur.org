<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tagline',
        'year',
        'members',
        'address',
        'facebook',
        'instagram',
        'whatsapp',
        'email',
    ];
}
