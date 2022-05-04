<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimotional extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'company_icon'
    ];

    public function langs(){
        return $this->hasMany(\App\Models\TestimotionalLang::class,'testimotional_id');
    }
}
