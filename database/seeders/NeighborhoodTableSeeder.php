<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Neighborhood;
use Illuminate\Database\Seeder;

class NeighborhoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Neighborhood::create([
            'neighborhood_name' => 'Alremal',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);

        Neighborhood::create([
            'neighborhood_name' => 'Shujaiya',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);

        Neighborhood::create([
            'neighborhood_name' => 'Alnaser',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);

        Neighborhood::create([
            'neighborhood_name' => 'Alnusirat',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);

        Neighborhood::create([
            'neighborhood_name' => 'Alzuton',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);

        Neighborhood::create([
            'neighborhood_name' => 'Jabalia',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);



        Neighborhood::create([
            'neighborhood_name' => 'Alnaser',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);

        Neighborhood::create([
            'neighborhood_name' => 'alShaykh Jarah',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);
        Neighborhood::create([
            'neighborhood_name' => 'Ajami',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);

        Neighborhood::create([
            'neighborhood_name' => 'Menashiya',
            'city_id' => City::inRandomOrder()->first()->id,

        ]);



    }
}
