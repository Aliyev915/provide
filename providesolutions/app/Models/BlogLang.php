<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogLang extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'slug',
        'blog_id',
        'lang'
    ];

    public function blog(){
        return $this->belongsTo(\App\Models\Blog::class);
    }
}
