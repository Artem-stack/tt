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
    protected $model = \App\Models\User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'head' => $this->faker->name(),
            'admin_created_id' => $this->faker->numberBetween(1, 2),
            'admin_updated_id' => $this->faker->numberBetween(1, 2),
            'email' => $this->faker->unique()->safeEmail(),
            'salary' => $this->faker->numberBetween(0, 500000),
            'phone' => $this->faker->e164PhoneNumber(), 
            'created_at' => $this->faker->dateTimeBetween('-20 days', now()),
            'position_id' => $this->faker->numberBetween(1, 5),
         
           
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
