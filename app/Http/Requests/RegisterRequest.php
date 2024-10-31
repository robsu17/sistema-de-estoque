<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'O campo usuário é obrigatório',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'O e-mail deve ser válido',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'O campo senha deve ter no mínimo 8 caracteres'
        ];
    }
}
