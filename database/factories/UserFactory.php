<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),//姓名
            'email' => 'user@gmail.com',//email str_random(10).'@mail.com',
            'email_verified_at' => now(),//email驗證時間
            'password' => '$2y$10$YSjl9Kz5PLLVTodhHLnU6OE.9/7VJ0z0X60nKY82uAlKNGzTS5/xe', // 密碼:123456789
            'remember_token' => Str::random(10),
            'address'=>fake()->address(),//住址
            'tel'=>fake()->phoneNumber(),//電話
            'birthdate'=>$this->faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('y/m/d'),//生日
        ];
    }



    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
