<?php

namespace Database\Factories;

use App\Models\Billing;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          
             'contents'=>'{
                "Accept-Language": "en-US,en;q=0.8",
                "Host": "headers.jsontest.com",
                "Accept-Charset": "ISO-8859-1,utf-8;q=0.7,*;q=0.3",
                "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8"
             }',
              'observation'=>$this->faker->sentence(5),
            'user_id'=>User::all()->random()->id,
            'patient_id'=>Patient::all()->random()->id,  
            'billing_id'=>Billing::all()->random()->id,    
        ];
    }
}
