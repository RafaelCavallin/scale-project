<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnDuty\StoreOnDutyRequest;
use App\Models\OnDuty;
use Illuminate\Http\Request;

class OnDutyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onDuty = OnDuty::all();

        if ($onDuty->isEmpty()) {
            return response()->json(['error' => 'Nenhum registro encontrado']);
        }

        return response()->json($onDuty);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOnDutyRequest $request)
    {
        $onDuty = new OnDuty();

        $onDuty->fill($request->all());
        $onDuty->save();

        return response()->json($onDuty);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
