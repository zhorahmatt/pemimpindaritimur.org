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
        'asiaworks_joined',
        'asiaworks_training',
        'image',
        'status',
        'google_sheet_synced_at',
        'google_sheet_row',
        'google_sheet_sync_error',
    ];

    protected function casts(): array
    {
        return [
            'google_sheet_synced_at' => 'datetime',
            'google_sheet_row' => 'integer',
        ];
    }
}
