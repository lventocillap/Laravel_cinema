<?php

namespace App\Http\Middleware;

use App\Models\PersonalAccessToken;
use App\Models\User;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CookieMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('auth');
        if(!$token){
            return new JsonResponse(['message'=>'Token not found']);
        }
        [$tokenId, $tokenValue] = explode('|', $token);
        $accessToken = PersonalAccessToken::where('id',$tokenId)->first()->plainTextToken;
        if(!$accessToken){
            return new JsonResponse(['message'=>'Token invalid or expired']);
        }
        $user = User::find($accessToken->tokenable_id);
        Auth::login($user);
            return $next($request);
        }
}
