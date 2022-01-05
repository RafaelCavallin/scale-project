<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\AuthUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(AuthUserRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'As credenciais não conferem.']);
        }

        return $user->createToken($request->email)->plainTextToken;
    }
}
