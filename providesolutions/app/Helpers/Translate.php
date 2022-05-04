<?php

namespace App\Helpers;

class Translate {
    public static function getTranslate($model,$lang){
        return $model->langs->firstWhere('lang',$lang);
    }
}