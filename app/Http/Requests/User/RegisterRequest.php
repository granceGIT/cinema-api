<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class RegisterRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'phone_number'=>['required','unique:users,phone_number','regex:/^\+7[\d]{10}/'],
            'password'=>['required','string'],
            'agreement'=>['required']
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'имя',
            'phone_number'=>'номер телефона',
            'password'=>'пароль',
            'agreement'=>'согласие'
        ];
    }
}
