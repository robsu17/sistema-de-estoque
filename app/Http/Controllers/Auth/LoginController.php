<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController
{
  public function index()
  {
    if (Auth::check()) {
      return redirect()->route('dashboard');
    }

    return view('pages.auth.login');
  }

  public function signin(LoginRequest $loginRequest)
  {
    $loginData = $loginRequest->validated();

    $userNotAlreadyExist = User::where('email', $loginData['email'])->first();

    if (!$userNotAlreadyExist) {
      return redirect()
        ->back()
        ->withErrors(['userNotAlreadyExist' => 'Usuário não está cadastrado!']);
    }

    $userAttempt = Auth::attempt([
      'email' => $loginData['email'],
      'password' => $loginData['password']
    ]);

    if (!$userAttempt) {
      return redirect()
        ->back()
        ->withErrors(['userNotAlreadyExist' => 'Usuário não está cadastrado!']);
    }

    return redirect()->route('dashboard');
  }
}