<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'email'
    ];

    public function langs(){
        return $this->hasMany(\App\Models\VacancyLang::class,'vacancy_id');
    }
}
