<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class FileManager{

    public static function upload($file, $folder){
        $image = rand().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/'.$folder),$image);
        return $image;
    }

    public static function delete($file,$folder){
        if(File::exists(public_path("uploads/{$folder}/{$file}"))){
            File::delete(public_path("uploads/{$folder}/{$file}"));
        }
    }
}