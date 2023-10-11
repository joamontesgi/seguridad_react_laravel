<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return json_encode($users);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            "message" => "Usuario creado exitosamente"
        ], 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        return json_encode($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return response()->json([
            "message" => "Usuario actualizado exitosamente"
        ], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            "message" => "Usuario eliminado"
        ], 202);
    }
}
