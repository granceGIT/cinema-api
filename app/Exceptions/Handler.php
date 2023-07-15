<?php

namespace App\Exceptions;

use App\Http\JSONHelper;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Laravel\Sanctum\Exceptions\MissingAbilityException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function(AuthenticationException $e,Request $request){
            if ($request->is('api/*')){
                throw new ApiException(403,'Ошибка авторизации');
            }
        });

        $this->renderable(function(NotFoundHttpException $e,Request $request){
            if ($request->is('api/*')){
                throw new ApiException(404,$e->getMessage());
            }
        });

        // for sanctum
        $this->renderable(function(MissingAbilityException $e,Request $request){
            if ($request->is('api/*')){
                throw new ApiException(403,'У вас нет доступа');
            }
        });

    }


}
