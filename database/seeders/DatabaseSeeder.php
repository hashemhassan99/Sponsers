<?php

namespace Database\Seeders;

use App\Models\ResidenceCountry;
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
      $this->call([
          GovernorateTableSeeder::class,
          CityTableSeeder::class,
          NationalityTableSeeder::class,
          NeighborhoodTableSeeder::class,
          ResidenceCountryTableSeeder::class,
          SponserSeeder::class,
          GovernmentSponser::class,
          UserTableSeeder::class,
      ]);
    }
}
