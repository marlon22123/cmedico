<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code'=>$this->faker->randomNumber(5,true),
            'name'=>$this->faker->word(),
            'description'=>$this->faker->sentence(4),
            'base_price'=>$this->faker->randomFloat(2,10,100),
            'tax'=>$this->faker->randomFloat(2,10,100),
            'total_price'=>$this->faker->randomFloat(2,10,100),
            'stock'=>$this->faker->randomNumber(2,true)
        ];
    }
}
