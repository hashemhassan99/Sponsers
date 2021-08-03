<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nationality::create([
            'nationality_name' => 'Palestinian'
        ]);

        Nationality::create([
            'nationality_name' => 'Egypt'
        ]);

        Nationality::create([
            'nationality_name' => 'Jordanian'
        ]);

        Nationality::create([
            'nationality_name' => 'American'
        ]);
    }
}
