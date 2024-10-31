<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;

class LoginController
{
  public function index()
  {
    return view('pages.auth.login');
  }

  public function signin(LoginRequest $loginRequest)
  {
    $loginData = $loginRequest->validated();
    dd($loginData);
  }
}