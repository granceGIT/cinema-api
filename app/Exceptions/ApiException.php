<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;

class ApiException extends HttpResponseException
{
    public function __construct($code = 422, $message = 'Ошбика валидации', $errors = [])
    {
        $data = [
            'error' => [
                'code' => $code,
                'message' => $message
            ]
        ];

        if (count($errors)) {
            $data['error']['errors'] = $errors;
        }

        parent::__construct(response()->json($data, $code));
    }
}
