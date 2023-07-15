<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RateFilmRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'rate'=>['required','between:1,10']
        ];
    }

    public function attributes()
    {
        return [
            'rate'=>'оценка'
        ];
    }
}
