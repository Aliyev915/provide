<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'service_id',
        'text'
    ];

    public function service(){
        return $this->belongsTo(\App\Models\Service::class);
    }
}
