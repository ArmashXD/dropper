<?php

namespace App\Helpers;

use App\Utils\RandomStringGenerator;

class Common{

    public static function generateRandomUniqueUrlCode($lenght = 0) : string
    {
        $generator = new RandomStringGenerator;
        return $generator->generate($lenght);
    }

    public static function deleteFileIfExists($path)
    {
        if (file_exists($path)) {
            unlink($path);
         }
    }

}