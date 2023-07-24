<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'phone_number'=>'required|string|regex:/^\+7[\d]{10}$/',
            'password'=>'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'password'=>'пароль',
            'phone_number'=>'номер телефона'
        ];
    }
}
