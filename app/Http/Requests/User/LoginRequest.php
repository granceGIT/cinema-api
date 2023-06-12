<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;
use App\Models\User;

class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'phone_number'=>'required|string',
            'password'=>'required|string',
        ];
    }
}
