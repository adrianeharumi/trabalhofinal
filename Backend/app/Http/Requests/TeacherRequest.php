<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Teacher;
use App\User;

class TeacherRequest extends UserRequest
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
<<<<<<< HEAD
          'name' => 'required',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|min:6',
          'password_confirmation'=>'required|min:6|same:password',
=======
          'name' => '',
          'email' => 'email|unique:users,email',
          'password' => 'min:6',
          'password_confirmation'=>'min:6|same:password',
>>>>>>> origin/JP_Relacoes_Back
          'certification' => 'string|min:2',
          'zone' => 'alpha',
      ];
        }
        if ($this->isMethod('put')) {
            return [
          'name' => '',
          'email' => 'email|unique:users,email',
          'password' => 'min:6',
          'number' => 'celular|unique:users,number',
          'birth' => 'data',
          'CPF' => 'cpf|unique:users,CPF',
          'certification' => 'file|mimes:pdf|max:10048',
          'instruments' => 'alpha',
          'lesson_price' => 'numeric',
          'rent_price' => 'numeric',
          'description' => 'string',
          'zone' => 'alpha',
          'district' => 'alpha',
          'photo' => 'file|image|mimes:jpeg,png,gif,webp|max:4048',
          'video' => 'string',
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
            'number.celular' => 'O número de telefone não é válido',
            'number.unique' => 'O Telefone já existe',
            'birth.data' => 'Insira uma data valida',
            'CPF.cpf' => 'Insira um CPF válido',
            'CPF.unique' => 'CPF já cadastrado',
            'password.min' => 'Minimo de caracteres é 6',
            'password.required' => 'Campo de senha necessario',
            'email.required' => 'Campo de email necessario',
            'name.required' => 'Campo de nome necessario',
            'certification.file' => 'O certificado tem que ser um arquivo',
            'certification.mimes' => 'O certificado tem que ter extensão pdf',
            'certification.max' => 'O certificado não pode ter mais de 10MB',
            'instruments.required' => 'O instrumento só pode conter letras alfabeticas',
            'instruments.alpha' => 'O instrumento só pode conter letras alfabeticas',
            'lesson_price.numeric' => 'O preço da aula tem que ser um número',
            'rent_price.numeric' => 'O preço do aluguel tem que ser um número',
            'zone.alpha' => 'A região só pode conter letras alfabeticas',
            'zone.required' => 'O campo da "região" é necessário',
            'district.alpha' => 'O bairro só pode conter letras alfabeticas',
            'photo.file' => 'A foto precisa ser um arquivo',
            'photo.image' => 'A foto precisa ser uma imagem',
            'photo.mimes' => 'A foto precisa ter uma dessas extensões: .jpeg; .png; .gif; .webp',
            'photo.max' => 'A foto precisa ter no máximo 4MB',
        ];
    }
}
