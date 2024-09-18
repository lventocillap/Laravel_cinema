<?php

namespace App\Http\Middleware;

use App\Enums\MovieStatusesEnum;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MovieMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $movie = $request->route('movie');
        if($movie->movieStatus->name === MovieStatusesEnum::Proximamente->value){
            return new JsonResponse(['message' => 'Proximamente']);
        }
        return $next($request);
    }
}
