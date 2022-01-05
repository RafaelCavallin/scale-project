<?php

namespace App\Http\Controllers;

use App\Http\Requests\Type\StoreTypeRequest;
use App\Http\Requests\Type\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Type::all();

        if ($type->isEmpty()) {
            return response()->json(['error' => 'Nenhum registro encontrado']);
        }

        return response()->json($type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        //$user = auth('sanctum')->user(); -> retornando usuário através do token

        $type = new Type();

        $type->fill($request->all());
        $type->slug = $type->createTypeSlug();

        $type->save();

        return response()->json($type);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::where('id', $id)->get();

        if ($type->isEmpty()) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID']);
        }

        return response()->json($type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, $id)
    {
        $type = Type::find($id);

        if ($type === null) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID.']);
        }

        $type->fill($request->all());
        $type->slug = $type->createTypeSlug();

        $type->save();

        return response()->json($type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);

        if ($type === null) {
            return response()->json(['error' => 'Nenhum registro encontrado com esse ID.']);
        }

        $type->delete();

        return response()->json(['success' => 'Registro deletado com sucesso.']);
    }
}
