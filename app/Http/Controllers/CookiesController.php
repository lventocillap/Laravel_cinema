<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class CookiesController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            throw new Exception('User not found', 404);
        }
        if (!Hash::check($request->password, $user->password)) {
            throw new Exception('Credentials invalid');
        }
        $token = $user->createToken('token')->plainTextToken;
        $cookie = Cookie::make('auth', $token, 1);
        return response()->json(['message' => 'session succesfull'])->withCookie($cookie);
    }

    public function logout(Request $request)
    {
        $token = $request->cookie('auth');
        [$tokenId, $tokenValue] = explode('|',$token);
        PersonalAccessToken::find($tokenId)->delete();
        return new JsonResponse(['message' => 'logout']);
    }
}
