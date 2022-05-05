<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLang extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'description',
        'service_id',
        'lang',
        'suggestions',
    ];

    protected $casts = ['suggestions'=>'array'];

    public function service(){
        return $this->belongsTo(\App\Models\Service::class);
    }
}
