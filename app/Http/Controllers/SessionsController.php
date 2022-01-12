<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    // function store for login
    public function store()
    {
        $this -> validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Por favor, revise los datos e intente nuevamente.',
                'email' => 'Por favor, revise el correo.',
                'password' => 'Por favor, revise la contraseña.',
            ]);
        }else{
            if(auth()->user()->role == 'admin'){
                return redirect() -> route('admin');
            }else{
                return redirect()-> route('user');
            }
        }
        return redirect()->to('/');
    }

    // function destroy for logout
    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
