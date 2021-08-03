<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Seeder;

class GovernorateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Governorate::create([
            'governorate_name' => ' Gaza'
        ]);

        Governorate::create([
            'governorate_name' => 'Khan Younes'
        ]);

        Governorate::create([
            'governorate_name' => 'Rafah'
        ]);
        Governorate::create([
            'governorate_name' => 'Alshmal'
        ]);

        Governorate::create([
            'governorate_name' => 'Bit lahia'
        ]);

        Governorate::create([
            'governorate_name' => 'Beit Hanoun'
        ]);
        Governorate::create([
            'governorate_name' => 'Daraj Quarter
'
        ]);
    }
}
