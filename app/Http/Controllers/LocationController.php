<?php

namespace App\Http\Controllers;

use App\Http\Requests\Location\StoreLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        if ($locations->isEmpty()) {
            return response()->json(['error' => 'Nenhum registro encontrado']);
        }

        return response()->json($locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {
        $location = new Location();

        $location->fill($request->all());
        $location->save();

        return response()->json($location);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::where('id', $id)->get();

        if ($location->isEmpty()) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID']);
        }

        return response()->json($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request, $id)
    {
        $location = Location::find($id);

        if ($location === null) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID.']);
        }

        $location->fill($request->all());

        $location->save();

        return response()->json($location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);

        if ($location === null) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID.']);
        }

        $location->delete();

        return response()->json(['success' => 'Registro deletado com sucesso.']);
    }
}
