<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ambient;
use App\Models\Attention;
use App\Models\Billing;
use App\Models\Patient;
use App\Models\Sale;
use App\Models\Service;
use App\Models\Specialty;
use App\Models\Type_document;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Ambient::factory(5)->create();
        Specialty::factory(4)->create();
        \App\Models\User::factory(10)->create();
         \App\Models\Type_document::factory()->create([
            'name' => 'DNI',
      
         ]);
         \App\Models\Type_document::factory()->create([
            'name' => 'RUC',
      
         ]);

         Patient::factory(50)->create();
         Billing::factory(10)->create();
      Sale::factory(20)->create();
         Service::factory(4)->create();
         Attention::factory(25)->create();   
    
    }
}
