<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Movie;
use App\Models\User;
use App\Services\Image\ImageService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct(
        private ImageService $imageService
    )
    {
        
    }
    public function storeImageMovie(Request $request, Movie $movie)
    {
        $path = $this->imageService->saveBase64($request->image);
        return Image::create([
            'imageble_id' => $movie->id,
            'imageble_type' => Movie::class,
            'url'=>$path,
        ]);
    }
    public function storeImageUser(Request $request, User $user)
    {
        return Image::create([
            'imageble_id' => $user->id,
            'imageble_type' => User::class,
            'url'=>$request->file('image')->store('users','public')
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
