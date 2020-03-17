<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8|string'
        ];
    }

    public function messages()
    {
        $required = 'Wypełnij wymagane pola';
        $min = 'Wpisz minimalną ilość znaków';
        $email = 'Wpisz prawidłowy adres e-mail';

        return [
            'email.required' => $required,
            'email.email' => $email,
            'password.required' => $required,
            'password.min' => $min
        ];
    }
}
