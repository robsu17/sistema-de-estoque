<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('pages.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $data = $request->validated();

        $userAlreadyExist = User::where('email', $data['email'])->first();

        if (!$userAlreadyExist) {
            return redirect()
                ->back()
                ->withErrors(['user_not_found' => 'Usuário não cadastrado!']);
        }

        $userLogged = Auth::attempt($data);

        if (!$userLogged) {
            return redirect()
                ->back()
                ->withErrors(['invalid_credentials' => 'Email ou senha incorretos!']);
        }

        return redirect()->route('dashboard');
    }
}
