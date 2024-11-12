<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('pages.auth.register');
    }

    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        $userAlreadyExist = User::where('email', $data['email'])->first();

        if ($userAlreadyExist) {
            return redirect()
                ->back()
                ->withErrors(['user_exist' => 'Usuário já está cadastrado!']);
        }

        $userCreated = User::create($data);

        if (!$userCreated) {
            return redirect()
                ->back()
                ->withErrors(['error_internal' => 'Erro ao criar usuário, tente novamente mais tarde!']);
        }

        $userAttempt = Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        if (!$userAttempt) {
            return redirect()->route('login');
        }

        return redirect()->route('dashboard');
    }
}
