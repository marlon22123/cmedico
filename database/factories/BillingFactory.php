<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billing>
 */
class BillingFactory extends Factory
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
            'voucher'=>$this->faker->randomElement(['BOLETA','FACTURA']),
             'serie'=>'F001',
             'number'=>'000'.$this->faker->randomNumber(3,false),
            'client_number'=>$this->faker->randomNumber(8,true),
            'client_name'=>$this->faker->name,

            'net'=>$this->faker->randomFloat(2,100,1000), 
             'tax'=>$this->faker->randomFloat(2,100,1000),
            'discount'=>$this->faker->randomFloat(2,100,1000),
            'total'=>$this->faker->randomFloat(2,100,1000),
          
        ];
    }
}
