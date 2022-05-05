<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyLang extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'lang',
        'vacancy_id'
    ];

    public function vacancy(){
        return $this->belongsTo(\App\Models\Vacancy::class);
    }

}
