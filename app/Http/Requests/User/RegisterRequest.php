<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class RegisterRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'phone_number'=>['required','size:11','unique:users,phone_number'],
            'password'=>['required','string'],
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'имя',
            'phone_number'=>'номер телефона',
            'password'=>'пароль',
        ];
    }
}
