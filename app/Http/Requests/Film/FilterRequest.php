<?php

namespace App\Http\Requests\Film;

use App\Http\Requests\ApiRequest;

class FilterRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'age_restriction_id'=>'sometimes',
            'director_id'=>'sometimes',
            'country_id'=>'sometimes',
        ];
    }
}
