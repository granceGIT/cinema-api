<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\ApiRequest;

class FilterRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'status_id'=>'sometimes'
        ];
    }
}
