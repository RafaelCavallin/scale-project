<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnDuty\StoreOnDutyRequest;
use App\Models\OnDuty;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

        //ddd($onDuty->date_start->diffInHours(Carbon::now())); -> diferença entre horas
        //ddd($onDuty->date_start < Carbon::now());

        if ($onDuty->date_start < Carbon::now()) {
            return response()->json(['error' => 'Não é possível iniciar com datas passadas.']);
        }

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
        $onDutyToDelete = OnDuty::find($id);
        $userLoggedInId = auth('sanctum')->user()->id;

        if ($onDutyToDelete === null) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID.']);
        }

        if ($userLoggedInId != $onDutyToDelete->user_id) {
            return response()->json(['error' => 'Esse plantão não pertence ao usuário logado.']);
        }

        $onDutyDeleted = $onDutyToDelete->delete();
        if ($onDutyDeleted) {
            //chamar evento aqui para envio de notificação
            return response()->json(['success' => 'Plantão cancelado com sucesso.']);
        } else {
            return response()->json(['error' => 'Erro ao cancelar o plantão.']);
        }
    }
}
