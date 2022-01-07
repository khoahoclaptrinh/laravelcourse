<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use InvalidArgumentException;
use BadMethodCallException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });


    }
    public function render($request, Throwable $exception){
        if ($request->is('api/*'))
        {
            $exception->getStatusCode();

            if ($exception instanceof NotFoundHttpException) {
                return ResponseHelper::error('NotFoundHttpException',null);
            }

            if ($exception instanceof ModelNotFoundException) {
                return ResponseHelper::error('ModelNotFoundException',null);
            }

            if ($exception instanceof HttpResponseException) {
                return ResponseHelper::error('HttpResponseException',null);
            }

            if ($exception instanceof InvalidArgumentException) {
                return ResponseHelper::error('InvalidArgumentException',null);
            }

            if ($exception instanceof BadMethodCallException) {
                return ResponseHelper::error('BadMethodCallException',null);
            }


            if ($exception instanceof AuthenticationException) {
                //$exception = $this->unauthenticated($request, $exception);
                return ResponseHelper::error('AuthenticationException',null);
            }

            if ($exception instanceof ValidationException) {
                //$exception = $this->convertValidationExceptionToResponse($exception, $request);
                return ResponseHelper::error('ValidationException',null);
            }

            if ($exception instanceof ThrottleRequestsException) {
                return ResponseHelper::error('ThrottleRequestsException',null);
            }
        }
        return parent::render($request, $exception);
    }
}
