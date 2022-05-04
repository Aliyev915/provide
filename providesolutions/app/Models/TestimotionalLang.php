<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimotionalLang extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profession',
        'text',
        'lang',
        'testimotional_id'
    ];

    public function imotional(){
        return $this->belongsTo(\App\Models\Testimotional::class);
    }
}
