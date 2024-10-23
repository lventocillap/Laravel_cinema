<?php
declare(strict_types=1);

namespace App\Services\Image;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function saveBase64(string $base64Image, string $folder = 'movie'): string
    {
        $image = base64_decode(explode(',',$base64Image)[1]);
        $fileExtension = $this->getFileExtension($base64Image);
        $filename = Str::uuid() . $fileExtension;
        $path = $folder . '/' . $filename;
        Storage::disk('public')->put($path, $image);
        return $path;
    }
    public function getFileExtension(string $base64Image): string
    {
        $matches = [];
        if(preg_match('/data:image\/(?<type>.+);base64,/',$base64Image, $matches)){
            $mineType = $matches['type'];
            switch($mineType){
                case 'jpg':
                    return 'jpg';
                case 'png':
                    return 'png';
                case 'webp':
                    return 'webp';
                case 'gif':
                    return 'gif';
                default:
                    throw new Exception('Not extension');
            }
        }
    }
}