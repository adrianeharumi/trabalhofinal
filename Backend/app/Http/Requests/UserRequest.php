<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
              'name' => '',
              'email' => 'email|unique:users,email',
              'password' => 'min:6',
              'password_confirmation'=>'min:6|same:password'
            ];
        }
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    public function messages()
    {
        return[
            'name.alpha' => 'O nome só pode conter letras alfabéticas',
            'email.email' => 'Insira um email valido',
            'email.unique' => 'Este email já existe',
            'password.min' => 'Campo de senha minimo de caracteres é 6',
            'password.required' => 'Campo de senha necessario',
            'password_confirmation.required' => 'Campo de senha necessario',
            'password_confirmation.min' => 'Campo de senha minimo de caracteres é 6',
            'password_confirmation.same' => 'As senhas precisam ser iguais',
            'email.required' => 'Campo de email necessario',
            'name.required' => 'Campo de nome necessario',
        ];
    }
}
