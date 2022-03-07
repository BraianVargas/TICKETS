<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    // search user by dni
    public function searchUser(Request $request)
    {
        $dni = $request->dni;
        $user = User::where('dni', $dni)->first();
        return response()->json($user);
    }
}
