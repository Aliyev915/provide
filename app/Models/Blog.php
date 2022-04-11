<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'view'
    ];

    public function langs(){
        return $this->hasMany(\App\Models\BlogLang::class,'blog_id');
    }

    public function images(){
        return $this->hasMany(\App\Models\BlogImage::class,'blog_id');
    }
}
