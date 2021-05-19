<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    /**
     * Return all patient appointments 
     *
     * @param int $patientId
     */
    public function index($patientId)
    {
        $patient = Patient::find($patientId);

        return Appointment::where('patient_id', $patient->id)->get();
    }

    /**
     * Create Appointment for a patient.
     *
     * @param int $patientId
     * @param Request $request
     * 
     */
    public function store($patientId, Request $request)
    {
        $patient = Patient::find($patientId);

        $appointment = Appointment::create([
            'availability_id' => $request->input('availability_id'),
            'patient_id' => $patient->id
        ]);
        $t = response()->json($appointment, 201);

        return response()->json($appointment, 201);
    }
}
