<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class EnsureNimisAuthorized
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->nim_dinus !== $request->route('nim')) {
            return response()->json(['message' => 'Akses ditolak.'], 403);
        }
        return $next($request);
    }
}
