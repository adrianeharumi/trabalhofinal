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
              'name' => 'required|alpha',
              'email' => 'required|email|unique:users,email',
              'password' => 'required|min:6',
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
            'password.min:6' => 'Minimo de caracteres é 6',
            'password.required' => 'Campo de senha necessario',
            'email.required' => 'Campo de email necessario',
            'name.required' => 'Campo de nome necessario',
        ];
    }
}
