<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statusAry = ['active', 'inactive'];
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(10, 1000),
            'quantity' => $this->faker->numberBetween(10, 100),
            'status' => $statusAry[rand(0,1)],
        ];
    }
}