<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [

    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [

    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];
    /**
     * Render the exception into an HTTP response.
     */

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return ResponseHelper(404, ' api not found');
            }
        });

        $this->renderable(function (MethodNotAllowedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return ResponseHelper(404, ' api not found');
            }
        });

        $this->renderable(function (UnauthorizedHttpException $exception, Request $request) {
            if ($request->is('api/*')) {
                if ($exception->getPrevious() instanceof TokenExpiredException) {
                    return ResponseHelper(420, 'الرجاء تسجيل الدخول');
                } elseif ($exception->getPrevious() instanceof TokenInvalidException) {
                    return ResponseHelper(420, 'الرجاء تسجيل الدخول');
                } elseif ($exception->getPrevious() instanceof TokenBlacklistedException) {
                    return ResponseHelper(420, 'الرجاء تسجيل الدخول ');
                }
            }
        });

        $this->reportable(function (Throwable $e) {
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return ResponseHelper(401, __('site.Unauthenticated'));
        }

        return redirect()->guest(route('login'));
    }
}