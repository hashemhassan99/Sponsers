<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'city_name' => ' Gaza',
            'governorate_id' => Governorate::inRandomOrder()->first()->id,

        ]);

        City::create([
            'city_name' => 'Ramallah',
            'governorate_id' => Governorate::inRandomOrder()->first()->id,

        ]);

        City::create([
            'city_name' => 'Hebron',
            'governorate_id' => Governorate::inRandomOrder()->first()->id,


        ]);
        City::create([
            'city_name' => 'Nazareth',
            'governorate_id' => Governorate::inRandomOrder()->first()->id,

        ]);

        City::create([
            'city_name' => 'Haifa',
            'governorate_id' => Governorate::inRandomOrder()->first()->id,

        ]);

        City::create([
            'city_name' => 'Yafa',
            'governorate_id' => Governorate::inRandomOrder()->first()->id,

        ]);

        City::create([
            'city_name' => 'Acre',
            'governorate_id' => Governorate::inRandomOrder()->first()->id,

        ]);

        City::create([
            'city_name' => 'Jerusalem',
            'governorate_id' => Governorate::inRandomOrder()->first()->id,

        ]);
    }
}
