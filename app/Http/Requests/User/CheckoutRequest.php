<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;
use App\Models\Showing;
use Illuminate\Validation\Rule;

class CheckoutRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'showing_id'=>['required','exists:showings,id'],
            'tickets'=>['array'],
            'tickets.*.seat_id'=>['required','exists:seats,id','distinct:strict'],
            'tickets.*.ticket_type_id'=>['required','exists:ticket_types,id']
        ];
    }
}
