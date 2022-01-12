<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denunciado;
use App\Models\Denunciante;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create(request(['name', 'email', 'role', 'password']));

        auth()->login($user);
        return redirect()->to('/');

    }
}
