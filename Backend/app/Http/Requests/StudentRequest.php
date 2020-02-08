<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\UserRequest;
use App\Student;
use App\User;


class StudentRequest extends UserRequest
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
        if($this->isMethod('post')){
        return [
            'name' => 'required|alpha',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:6'
        ];
      }
        if($this->isMethod('put')){
          return [
            'name' => 'alpha',
            'email' => 'email|unique:users,email',
            'password' => 'min:6',
            'number' => 'celular|unique:users,number',
            'birth' => 'data',
            'CPF' => 'cpf|unique:users,CPF',
            'photo' => 'file|image|mimes:jpeg,png,gif,webp|max:4048'
          ];
      }
    }

      protected function failedValidation(Validator $validator){
          throw new HttpResponseException(response()->json($validator->errors(),422));
      }

      public function messages(){
          return[
              'name.alpha' => 'O nome só pode conter letras alfabéticas',
              'email.email' => 'Insira um email valido',
              'email.unique' => 'Este email já existe',
              'number.celular' => 'O número de telefone não é válido',
              'number.unique' => 'O Telefone já existe',
              'birth.data' => 'Insira uma data valida',
              'CPF.cpf' => 'Insira um CPF válido',
              'CPF.unique' => 'CPF já cadastrado',
              'password.min' => 'Minimo de caracteres é 6',
              'password.required' => 'Campo de senha necessario',
              'email.required' => 'Campo de email necessario',
              'name.required' => 'Campo de nome necessario',
              'photo.file' => 'A foto precisa ser um arquivo',
              'photo.image' => 'A foto precisa ser uma imagem',
              'photo.mimes' => 'A foto precisa ter uma dessas extensões: .jpeg; .png; .gif; .webp',
              'photo.max' => 'A foto precisa ter no máximo 4MB',
          ];
      }

}
