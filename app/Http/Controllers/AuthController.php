<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {   
        $request->validate([
            'text_username' => 'required|email',
            'text_password' => 'required|min:4|max:15',
        ],
        [
            'text_username.required' => 'O campo usuário é obrigatório',
            'text_password.required' => 'A senha é obrigatória',
            'text_password.min' => 'A senha deve ter no mínimo 4 caracteres',
            'text_password.max' => 'A senha deve ter no máximo 15 caracteres',
            'text_username.email' => 'O campo usuário deve ser um email válido',
        ]);

        $username = $request->input('text_username');
        $password = $request->input('text_password');
        // dd($username, $password);

        try {
            DB::connection()->getPdo();
            echo 'conectado';
        } catch (\Exception $e) {
           echo 'erro de conexão' . $e->getMessage();
        }
    }

    public function logout(Request $request)
    {
        echo 'logout';
    }
}
