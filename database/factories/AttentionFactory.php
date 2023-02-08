<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attention>
 */
class AttentionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'status'=>$this->faker->randomElement([1,2,3]),
            'user_id'=>User::all()->random(),
            'service_id'=>Service::all()->random()->id,
            'patient_id'=>Patient::all()->random()->id,
        ];
    }
}
