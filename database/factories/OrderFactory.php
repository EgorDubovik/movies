<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'address_from_id' => 1,
            'address_to_id' => 1,
            'description' => $this->faker->text(),
            'volume' => rand(10,100) / 10,
            'price' => rand(10,100) / 10,
        ];
    }
}
