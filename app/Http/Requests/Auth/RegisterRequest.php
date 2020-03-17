<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'birthday' => 'required|date|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        $required = 'Wypełnij wymagane pola';
        $min = 'Wpisz minimalną ilość znaków';
        $email = 'Wpisz prawidłowy adres e-mail';
        $date = 'Podaj datę urodzenia w prawidlowym formacie';
        $unique = 'Konto o podanym adresie e-mail już istnieje';

        return [
            'name.required' => $required,
            'name.min' => $min,
            'last_name.required' => $required,
            'last_name.min' => $min,
            'email.required' => $required,
            'email.email' => $email,
            'email.unique' => $unique,
            'password.required' => $required,
            'password.min' => $min,
            'birthday.required' => $required,
            'birthday.date_format' => $date
        ];
    }
}
