<?php

namespace App\Models;

use App\Traits\HasPicture;
use App\Traits\Slugable;
use Fadi\LaravelRole\Traits\HasRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRole, HasPicture, Slugable;

    protected $guarded = [];

    protected $defaultPicture = 'images/defaultPicture.png';
    protected $imagePath = 'public/photos/admins/';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        static::$separator = ".";
        static::$slug = "username";
    }
}
