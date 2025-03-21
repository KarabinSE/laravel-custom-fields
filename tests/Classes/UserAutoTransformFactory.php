<?php

namespace OnrampLab\CustomFields\Tests\Classes;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserAutoTransformFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserAutoTransform::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'account_id' => Account::factory()
        ];
    }
}
