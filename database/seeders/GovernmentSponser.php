<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Governorate;
use App\Models\Nationality;
use App\Models\Neighborhood;
use App\Models\PersonalSponser;
use App\Models\ResidenceCountry;
use Faker\Factory;
use Illuminate\Database\Seeder;

class GovernmentSponser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i<15;$i++) {
            \App\Models\GovernmentSponser::create([

                'sponser_name' => $faker->name,
                'address' => $faker->address,
                'mobile' => $faker->randomDigit(),
                'phone' => $faker->randomDigit(),
                'email' => $faker->email,
                'contact_person' => $faker->name,
                'city_id' => City::inRandomOrder()->first()->id,

            ]);
        }
    }
}
