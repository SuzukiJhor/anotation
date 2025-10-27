<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {   
        $request->validate([
            'text_username' => 'required',
            'text_password' => 'required',
        ],
        [
            'text_username.required' => 'O campo usuário é obrigatório',
            'text_password.required' => 'A senha é obrigatória',
        ]);

        $username = $request->input('text_username');
        $password = $request->input('text_password');

        dd($username, $password);
    }

    public function logout(Request $request)
    {
        echo 'logout';
    }
}
