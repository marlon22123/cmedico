<?php

namespace Database\Factories;

use App\Models\Type_document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'surname'=>$this->faker->name(),
            'type_document_id'=> Type_document::all()->random()->id,
            'number'=>$this->faker->randomNumber(8, true),
            'phone'=>$this->faker->randomNumber(9, true),
            'place'=>$this->faker->country(),
            'birth'=>$this->faker->date(),
        ];
    }
}
