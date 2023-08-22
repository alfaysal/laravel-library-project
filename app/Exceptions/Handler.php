<?php

namespace App\Exceptions;

use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

use function PHPUnit\Framework\returnSelf;

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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function render($request, Throwable $e)
    // {
    //     switch($e) {
    //         case $e instanceof ModelNotFoundException:
    //             return $this->modelNotFoundExceptionResponse($e);
    //         case $e instanceof QueryException:
    //             return response()->json(['message' => 'Something went wrong', 'success' => false,], 500);
    //     }

    //     return parent::render($request, $e);
    // }

    // protected function modelNotFoundExceptionResponse(ModelNotFoundException $e): Response {
    //     switch($e->getModel()) {
    //         case Student::class:
    //             $type = 'Student';
    //             break;
    //         default:
    //             $type = '';
    //             break;
    //     }

    //     return response()->json([
    //         'message' => strlen($type) ? sprintf('%s not found', $type) : 'Something went wrong',
    //         'success' => false,
    //     ], 404);
    // }
}
