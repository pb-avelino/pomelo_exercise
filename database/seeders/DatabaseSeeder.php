<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(ClinicsTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(AvailabilitiesTableSeeder::class);
        
        Schema::enableForeignKeyConstraints();
    }
}
