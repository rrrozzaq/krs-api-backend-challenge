<?php
namespace App\Exceptions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = ['current_password', 'password', 'password_confirmation'];
    public function register(): void
    {
        $this->renderable(function (Throwable $e, Request $request) {
            if ($request->wantsJson()) {
                if ($e instanceof KrsRegistrationException) {
                    return response()->json(['message' => $e->getMessage()], 409);
                }
                if ($e instanceof ModelNotFoundException) {
                    return response()->json(['message' => 'Data tidak ditemukan.'], 404);
                }
            }
        });
    }
}
