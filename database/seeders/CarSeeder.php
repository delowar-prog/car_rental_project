<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use Faker\Factory as Faker;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            Car::create([
                'name' => $faker->company . ' ' . $faker->word,
                'brand' => $faker->randomElement(['Toyota', 'Honda', 'BMW', 'Mercedes', 'Ford', 'Nissan', 'Chevrolet']),
                'model' => $faker->randomElement(['Sedan', 'SUV', 'Truck', 'Coupe', 'Convertible']),
                'year' => $faker->numberBetween(2000, 2023),
                'car_type' => $faker->randomElement(['Petrol', 'Diesel', 'Electric', 'Hybrid']),
                'daily_rent_price' => $faker->randomFloat(2, 3000, 10000), // Random price between 30 and 150
            ]);
        }
    }
        //
}
