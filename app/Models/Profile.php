<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'tagline',
        'year',
        'members',
        'address',
        'bank_name',
        'bank_number',
        'bank_account',
        'facebook',
        'instagram',
        'whatsapp',
        'email',
    ];
}
