<?php


namespace App\Traits;


use Illuminate\Support\Str;

trait HasPicture
{

    public function getPictureAttribute($picture)
    {
        if(is_null($picture) || $picture == '' || !\Storage::exists($this->imagePath . $picture)) {
            return url($this->defaultPicture);
        }
        return url(\Storage::url($this->imagePath . $picture));
    }

    public function savePicture($picture)
    {
        if($picture == null)
            return;

        $pictureName = Str::random(40) . '.' . $picture->extension();
        $picture->storeAs($this->imagePath, $pictureName);

        $this->picture = $pictureName;

        $this->save();
    }
}