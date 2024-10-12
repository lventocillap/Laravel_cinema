<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Movie;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function storeImageMovie(Request $request, Movie $movie)
    {
        return Image::create([
            'url'=>$request->file('image')->store('movies','public'),
            'imageble_id' => $movie->id,
            'imageble_type' => Movie::class
        ]);
    }
    public function storeImageUser(Request $request, User $user)
    {
        return Image::create([
            'url'=>$request->file('image')->store('users','public'),
            'imageble_id' => $user->id,
            'imageble_type' => User::class
        ]);
    }
    public function getImageMovie(Movie $movie)
    {
        $image = $movie->image;
        
        return new JsonResponse($image);
    }
    public function getImageUser(User $user)
    {
        $image = $user->image;

        return new JsonResponse($image);
    }
}
