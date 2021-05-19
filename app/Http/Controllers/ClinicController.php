<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        return Clinic::all();
    }

    /**
     * @inheritDoc
     */
    public function show($id)
    {
        return Clinic::find($id);
    }

    /**
     * Retrive providers
     *
     * @param int $id
     * 
     */
    public function providers($id)
    {
        return Clinic::find($id)->providers;
    }
}
