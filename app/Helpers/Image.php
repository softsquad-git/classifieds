<?php

namespace App\Helpers;

class Image
{
    const PATH = 'assets/data/classifieds/';
    const DF_FILENAME = 'df.png';

    public static function getImageAd($path)
    {
        if (file_exists(Image::PATH.$path)){
            return asset(Image::PATH.$path);
        }

        return asset(Image::PATH.Image::DF_FILENAME);
    }

}
