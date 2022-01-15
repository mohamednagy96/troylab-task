<?php

namespace App\Exceptions;

use App\Http\Controllers\Api\V1\CoreJsonResponse;
use ErrorException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use CoreJsonResponse;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // if ($request->isJson() || ($request->headers->get('accept') == "application/json")) {

        //     if ($exception instanceof ErrorException) {
        //         return $this->serverError();
        //     }

        //     if ($exception instanceof ModelNotFoundException) {
        //         return $this->notFound();
        //     }

        //     if ($exception instanceof MethodNotAllowedHttpException) {
        //         return $this->notFound();
        //     }

        //     if ($exception instanceof AuthenticationException) {
        //         return $this->unauthorized();
        //     }

        //     if ($exception instanceof AuthorizationException) {
        //         return $this->forbidden();
        //     }

        //     if ($exception instanceof ValidationException) {
        //         return $this->invalidRequest(Arr::flatten($exception->validator->getMessageBag()->toArray()));
        //     }

        //     return $this->serverError();
        // }

        // if ($exception instanceof \Illuminate\Database\QueryException){ 
        //     if($exception->errorInfo[0] == '23000' && str_contains($exception->errorInfo[2], 'Cannot delete or update a parent row') ){
        //         return back()->with(['error' => 'sorry you cant delete this ... because it is use in system']);
        //     }
        // }

        return parent::render($request, $exception);
    }
}

