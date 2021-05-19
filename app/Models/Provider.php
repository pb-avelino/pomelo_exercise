<?php

namespace App\Models;

use App\Models\Availability;
use App\Models\Person;

class Provider extends Person
{
    /**
     * Search all available time slots for a Provider
     * 
     * array[from] string representing a DateTime
     * array[to] string representing a DateTime
     * @see https://www.php.net/manual/en/datetime.format.php
     *
     * @param array $params
     */
    public function getAvailabilities($params)
    {
        $avaiabilities = Availability::leftJoin('appointments', function ($join) {
            $join->on('availabilities.id', '=', 'appointments.availability_id');
        })
            ->where('provider_id', $this->attributes['id'])
            ->whereNull('appointments.availability_id')
            ->select('availabilities.*');

        if (!empty($params['from'])) {
            $avaiabilities = $avaiabilities->where('availabilities.start_at', '>=', $params['from']);
        }

        if (!empty($params['to'])) {
            $avaiabilities = $avaiabilities->where('availabilities.start_at', '<=', $params['to']);
        }

        return $avaiabilities->get();
    }
}
