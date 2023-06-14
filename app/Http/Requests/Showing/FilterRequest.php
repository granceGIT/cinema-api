<?php

namespace App\Http\Requests\Showing;

use App\Http\Requests\ApiRequest;

class FilterRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'id'=>'sometimes',
            'film_id'=>'sometimes',
            'hall_id'=>'sometimes',
            'start_time'=>'sometimes',
            'date'=>'sometimes',
        ];
    }
}
