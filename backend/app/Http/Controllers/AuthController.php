<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json(['access_token' => $token]);
    } else {
        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }
}

    public function logout(Request $request)
    {
        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json(['message' => 'Cierre de sesión exitoso']);
    }


}
