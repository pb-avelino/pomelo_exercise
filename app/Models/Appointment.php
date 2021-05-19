<?php

namespace App\Models;

use App\Models\Availability;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public $timestamps = false;

    /** @var array */
    protected $fillable = [
        'availability_id',
        'patient_id',
    ];

    /** @var array */
    protected $appends = ['schedule'];

    /**
     * Find the start and end dates for an appointment.
     * 
     */
    public function getScheduleAttribute()
    {
        $availability = Availability::find($this->attributes['availability_id']);

        return [
            'from' => $availability->start_at,
            'to' => $availability->end_at,
        ];
    }
}
