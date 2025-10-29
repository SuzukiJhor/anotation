<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        
        $user = User::where('username', $username)
                ->where('deleted_at', null)
                ->first();
        
        if (!$user) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Usuário ou Senha incorretos');
        }

        if (!password_verify($password, $user->password)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Usuário ou Senha incorretos');
        }  
        
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
            ]
        ]);

       return redirect()->to('/');
    }

    public function logout()
    {
       session()->forget('user');
       return redirect()->to('/login');
    }
}
