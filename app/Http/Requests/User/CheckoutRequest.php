<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class CheckoutRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'showing_id'=>['required','exists:showings,id'],
            'price'=>['nullable'],
            'tickets'=>['array'],
            'tickets.*.seat_id'=>['required','exists:seats,id','distinct:strict'],
        ];
    }
}
