<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class RegisterController
{
  public function index()
  {
    return view('pages.auth.register');
  }

  public function signup(RegisterRequest $registerRequest)
  {
    try {
      $registerData = $registerRequest->validated();

      $user = User::where('email', $registerData['email'])->first();
      if ($user) {
        return redirect()->back()
          ->withErrors(['userAlreadyExist' => 'Usuário já possui uma conta registrada']);
      }

      $userCreated = User::create([
        'name' => $registerData['username'],
        'email' => $registerData['email'],
        'password' => bcrypt($registerData['password']),
      ]);

      if (!$userCreated) {
        throw new \Exception('Erro ao registrar usuário');
      }

      return redirect()->route('login.index')
        ->with('userCreated', 'Usuário criado com sucesso! Você já pode fazer o login.');

    } catch (\Exception $e) {
      Log::error('Erro ao registrar usuário', [
        'error' => $e->getMessage(),
        'trace' => $e->getTraceAsString(),
        'user_data' => $registerRequest->all(),
      ]);

      return redirect()->back()
        ->withErrors(['serverError' => 'Erro interno do servidor. Tente novamente mais tarde.']);
    }
  }

}