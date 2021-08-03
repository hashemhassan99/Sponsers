<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Governorate;
use App\Models\Nationality;
use App\Models\Neighborhood;
use App\Models\PersonalSponser;
use App\Models\ResidenceCountry;
use App\Models\Sponser;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SponserSeeder extends Seeder
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
            PersonalSponser::create([
                'verification_card_type' => 'identification',
                'verification_card' => $faker->randomDigit(),
                'sponser_name' => $faker->name,
                'address' => $faker->address,
                'mobile' => $faker->randomDigit(),
                'phone' => $faker->randomDigit(),
                'email' => $faker->email,
                'governorate_id' => Governorate::inRandomOrder()->first()->id,
                'city_id' => City::inRandomOrder()->first()->id,
                'neighborhood_id' => Neighborhood::inRandomOrder()->first()->id,
                'residence_country_id' => ResidenceCountry::inRandomOrder()->first()->id,
                'nationality_id' => Nationality::inRandomOrder()->first()->id,


            ]);
        }
    }
}
