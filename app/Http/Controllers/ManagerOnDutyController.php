<?php

namespace App\Http\Controllers;

use App\Models\OnDuty;

class ManagerOnDutyController extends Controller
{
    public function listAllOnDuty()
    {
        if (auth('sanctum')->user()->isAdmin == 0) {
            return response()->json(['error' => 'Somente usuários administradores podem executar essa solicitação.']);
        }

        $allOnDuties = OnDuty::all();

        return response()->json($allOnDuties);
    }
    public function listAllOnDutyByUser()
    {
        $userLoggedInId = auth('sanctum')->user()->id;
        $allOnDutiesByUser = OnDuty::where('user_id', $userLoggedInId)->get();

        if ($allOnDutiesByUser->isEmpty()) {
            return response()->json(['error' => 'Nenhum registro encontrado para o usuário logado']);
        }

        return response()->json($allOnDutiesByUser);
    }
}
