<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    /**
     * Retrive all Providers
     *
     */
    public function index()
    {
        return Provider::all();
    }

    /**
     * Finds and returns a single Provider
     *
     * @param int $id
     */
    public function show($id)
    {
        return Provider::find($id);
    }

    /**
     * Retrive all the availabilities for a single Provider
     *
     * @param int $id
     * @param Request $request
     */
    public function availabilities($id, Request $request)
    {
        return Provider::find($id)->getAvailabilities($request->all());
    }

    /**
     * Find Providers by first and/or last name
     *
     * @param Request $request
     */
    public function search(Request $request)
    {
        $providers = Provider::where($request->all());
        if ($providers->count() == 0) {
            throw new ModelNotFoundException();
        }
        return $providers->get();
    }
}
