<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    /**
     * Finds an return a single patient
     *
     * @param int $id
     */
    public function show($id)
    {
        return Patient::find($id);
    }
}
