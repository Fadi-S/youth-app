<?php


namespace App\Traits;


trait HasPicture
{

    public function getPictureAttribute($picture)
    {
        if(is_null($picture) || $picture == '' || !\Storage::exists($this->imagePath . $picture)) {
            return url($this->defaultPicture);
        }
        return url(\Storage::url($this->imagePath . $picture));
    }

    public function savePicture($image)
    {

    }
}