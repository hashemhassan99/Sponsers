<?php

namespace Database\Seeders;

use App\Models\ResidenceCountry;
use Illuminate\Database\Seeder;

class ResidenceCountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResidenceCountry::create([
            'residence_name' => 'palestine'
        ]);

        ResidenceCountry::create([
            'residence_name' => 'egypt'
        ]);

        ResidenceCountry::create([
            'residence_name' => 'jordan'
        ]);

        ResidenceCountry::create([
            'residence_name' => 'America'
        ]);

        ResidenceCountry::create([
            'residence_name' => 'india'
        ]);
    }
}
