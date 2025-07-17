<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Exceptions\KrsRegistrationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth.nim' => \App\Http\Middleware\EnsureNimisAuthorized::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (Throwable $e, Request $request) {
            if ($request->wantsJson()) {
                if ($e instanceof KrsRegistrationException) {
                    return response()->json(['message' => $e->getMessage()], 409);
                }
                if ($e instanceof ModelNotFoundException) {
                    return response()->json(['message' => 'Data tidak ditemukan.'], 404);
                }
            }
        });
    })->create();
