<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function form()
    {
        return view('auth.form');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return to_route('notes.index')->with('message', 'Login efetuado com sucesso');
        }

        return to_route('login')->with('message', 'Foi tudo errado');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('message', 'Logout efetuado com sucesso');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ], [
            'required' => 'O :attribute é obrigatório',
        ]);
        User::create($data);
        return to_route('auth.form')->with('message', 'Usuário criado com sucesso!');
    }
}
