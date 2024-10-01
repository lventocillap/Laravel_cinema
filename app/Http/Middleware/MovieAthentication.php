<?php

namespace App\Http\Middleware;

use App\Enums\MovieStatusesEnum;
use App\Models\Billboard;
use Closure;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class MovieAthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $billboardID = $request->billboard_id;
        $billboard = Billboard::find($billboardID);
        if (!$billboard) {
            return throw new Exception('Not found Billboard', HttpResponse::HTTP_NOT_FOUND);
        }
        if($billboard->movie->movieStatus->name !== MovieStatusesEnum::Cartelera->value) {
            return new JsonResponse(['message'=>'Movie not avalaible']);
        }
        return $next($request);
    }
}
