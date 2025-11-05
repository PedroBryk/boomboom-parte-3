<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostra o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Realiza o login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        // Mapeia 'senha' para 'password' para o attempt funcionar
        $credentials = [
            'email' => $request->email,
            'password' => $request->senha,
        ];

        // Tenta autenticar como Aluno
        if (Auth::guard('aluno')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/aluno/home');
        }

        // Tenta autenticar como Professor
        if (Auth::guard('professor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/professor/home');
        }

        // Tenta autenticar como Administrador
        if (Auth::guard('administrador')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/administrador/home');
        }

        // Falha no login
        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    // Realiza o logout de todos os guards
    public function logout(Request $request)
    {
        Auth::guard('aluno')->logout();
        Auth::guard('professor')->logout();
        Auth::guard('administrador')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
