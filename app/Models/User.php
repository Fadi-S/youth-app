<?php

namespace App\Models;

use App\Traits\HasPicture;
use App\Traits\Slugable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Slugable, HasPicture, HasApiTokens;

    protected $defaultPicture = 'images/defaultPicture.png';
    protected $imagePath = 'public/photos/users/';

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        static::$separator = ".";
        static::$slug = "username";
    }

    public function complete($task)
    {
        $method = is_array($task) ? 'saveMany' : 'save';

        $this->tasks()->$method($task);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
