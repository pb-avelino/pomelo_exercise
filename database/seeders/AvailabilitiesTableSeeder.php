<?php

namespace Database\Seeders;

use App\Models\Availability;
use App\Models\Provider;
use Illuminate\Database\Seeder;

class AvailabilitiesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Availability::truncate();

        $interval = '+15 minutes';

        $workDayStart = new \DateTime('now');
        $workDayStart->setTime(9, 0, 0);

        $lunchStart = new \DateTime('now');
        $lunchStart->setTime(12, 0, 0);
        $lunchEnd = clone $lunchStart;
        $lunchEnd->modify('+1 hour');

        $workDayEnd = new \DateTime('now');
        $workDayEnd->setTime(16, 59, 59);

        /** @var Provider $provider */
        foreach (Provider::all() as $provider) {
            $startAt = clone $workDayStart;

            while ($startAt < $workDayEnd) {
                $endAt = clone $startAt;
                $endAt->modify($interval);

                if ($startAt < $lunchStart || $startAt >= $lunchEnd) {

                    Availability::create([
                        'provider_id' => $provider->id,
                        'start_at' => $startAt,
                        'end_at' => $endAt
                    ]);
                }
                $startAt->modify($interval);
            }
        }
    }
}
