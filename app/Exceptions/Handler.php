<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof ValidationException) {
                return response()->json(
                    $exception->errors(), 
                    $exception->status
                );
            }
            if ($exception instanceof ModelNotFoundException) {
                $ids = $exception->getIds();
                $id = $ids[0];
                return response()->json(
                    ["error" => "Recurso {$id} não encontrado"],
                    404,
                    ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8']
                );
            }

            if ($exception instanceof QueryException) {
                 return response()->json(
                    ["error" => "Contate o administrador", "codigo" => $exception->getCode()],
                    401,
                    ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8']
                );
            }

           
        }
        
        return parent::render($request, $exception);
    }
}
