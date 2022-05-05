<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phones',
        'header_logo',
        'footer_logo'
    ];

    protected $casts = ['phones'=>'array'];
}
