<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Response;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        $routeName = $request->route()->getName();
        $entity = Str::of($routeName)->explode('.')->first();
        $action = Str::of($routeName)->explode('.')->last();

        if (in_array($action, ['index', 'show'])) {
            return $next($request);
        }

        if (!auth()->user()->hasRole($entity)) {
            return response()->json([
                'message' => 'forbidden'
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
