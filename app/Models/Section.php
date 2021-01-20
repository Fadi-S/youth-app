<?php

namespace App\Models;

use App\Traits\HasPicture;
use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory, Slugable, HasPicture;

    protected $defaultPicture = 'images/defaultPicture.png';
    protected $imagePath = 'public/photos/sections/';

    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
