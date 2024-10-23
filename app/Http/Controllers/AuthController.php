<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return new JsonResponse(['message'=>'Not found User', 'Code'=>Response::HTTP_NOT_FOUND]);
        }
        if (!Hash::check($request->password, $user->password)) {
            throw new Exception('Credentials invalids', Response::HTTP_UNAUTHORIZED);
        }
        $payload = [
            'userId' => $user->id,
            'iat' => time(),
            'exp' => time() + 1200
        ];
        $token = JWT::encode($payload, config('services.JWT.key'), 'HS256');
        return new JsonResponse(['message' => 'Session started', 'token' => $token]);
        
    } 
}
