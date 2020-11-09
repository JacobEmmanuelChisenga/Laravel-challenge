<?php

namespace App\Models;

class File 
{
    public static function getURL($file) {

        $file   = substr($file,7);
        $storage = "storage/".$file;
        return url($storage); 

    }    
}
