<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'username' => User::makeSlug($name),
            'email_verified_at' => now(),
            'phone' => $this->faker->phoneNumber,
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
