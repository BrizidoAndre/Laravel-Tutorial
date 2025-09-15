<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'email', 'unique:Users,email'],
        ]);
        $data['email_verified_at'] = date('Y-m-d H:i:s');
        \App\Models\User::create($data);

        return to_route('login.index')->with('message', 'User was created');
    }

    public function log(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string',
                function ($att, $value, $fail) {
                    if ($value === '123') {
                        $fail('A senha não pode ser 123');
                    }
                }
            ],
        ], [
            'required' => 'obrigatório',
            'email' => 'O campo deve ser um email válido'
        ]);
        $credentials = $request->only('email', 'password');
        $authenticated = Auth::attempt($credentials);
        if (!$authenticated) {
            return to_route('login.index')->withErrors(['error' => 'Email ou senha inválidos']);
        }
        $request->session()->regenerate();
        return to_route('login.index')->with(['success' => 'Login efetuado com sucesso']);
    }

    public function destroy()
    {
        Auth::logout();
        return to_route('login.index')->with(['success' => 'Logout efetuado com sucesso']);
    }
}
