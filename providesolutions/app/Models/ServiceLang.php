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
        'description',
        'service_id',
        'lang'
    ];

    public function service(){
        return $this->belongsTo(\App\Models\Service::class);
    }
}
