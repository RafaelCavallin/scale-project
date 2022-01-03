<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::all();

        if ($address->isEmpty()) {
            return response()->json(['error' => 'Nenhum registro encontrado']);
        }

        return response()->json($address);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {
        $address = new Address();

        $address->fill($request->all());

        $address->save();

        return response()->json($address);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::where('id', $id)->get();

        if ($address->isEmpty()) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID']);
        }

        return response()->json($address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, $id)
    {
        $address = Address::find($id);

        if ($address === null) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID.']);
        }

        $address->fill($request->all());

        $address->save();

        return response()->json($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);

        if ($address === null) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID.']);
        }

        $address->delete();

        return response()->json(['success' => 'Registro deletado com sucesso.']);
    }
}
