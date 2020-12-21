<?php


namespace App\Traits;


trait HasPicture
{

    public function getPictureAttribute($picture)
    {
        if(is_null($picture) || $picture == '' || !\Storage::exists('public/photos/admins/' . $picture)) {
            return url("images/defaultPicture.png");
        }
        return url(\Storage::url('public/photos/admins/' . $picture));
    }

    public function savePicture($image)
    {

    }
}