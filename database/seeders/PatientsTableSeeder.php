<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\Patient;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::truncate();
        $faker = Faker::create();

        /** @var Clinic $clinic */
        foreach (Clinic::all() as $clinic) {

            for ($i = 0; $i < 5; $i++) {
                Patient::create([
                    'clinic_id' => $clinic->id,
                    'first_name' => $faker->firstName(),
                    'last_name' => $faker->lastName(),
                ]);
            }
        }
    }
}
