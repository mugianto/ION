<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\Access\AuthorizationException;


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
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception) && $exception->getStatusCode() == 404) {
            return response()->view('errors.404', [], 404);
        }

        return parent::render($request, $exception);
    }

    protected function failedAuthorization($request, AuthorizationException $exception)
    {
        return redirect('/cman/kategori')->with('pesanError', 'Kategori ini tidak dapat dihapus');
    }


}
