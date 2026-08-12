<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'city',
        'size',
        'business_name',
        'business_field',
        'position',
        'problem',
        'hope',
        'from',
        'image',
        'status',
    ];
}
