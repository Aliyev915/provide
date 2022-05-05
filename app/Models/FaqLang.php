<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqLang extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'lang',
        'faq_id'
    ];

    public function faq(){
        return $this->belongsTo(\App\Models\Faq::class);
    }
}
