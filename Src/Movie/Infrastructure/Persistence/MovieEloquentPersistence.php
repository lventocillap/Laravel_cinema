<?php

declare(strict_types=1);

namespace Src\Movie\Infrastructure\Persistence;

use App\Models\Movie as AppMovie;
use Src\Movie\Domain\Exception\MovieNotFound;
use Src\Movie\Domain\Interface\MovieInterface;
use Src\Movie\Domain\Model\Movie;
use Src\Movie\Domain\Model\Status;

class MovieEloquentPersistence implements MovieInterface
{

    public function index(): array
    {
        $movies = AppMovie::all();

        return $movies->map(function ($movie) {
            return new Movie(
                $movie->id,
                $movie->title,
                $movie->gender,
                $movie->time,
                $movie->premiere,
                new Status(
                    $movie->movieStatus->id,
                    $movie->movieStatus->name
                )
            );
        })->toArray();
    }
    public function show(int $id): ?Movie
    {
        $movie = AppMovie::find($id);
        if(!$movie){
            return throw new MovieNotFound;
        }
        return new Movie(
            $movie->id,
            $movie->title,
            $movie->gender,
            $movie->time,
            $movie->premiere,
            new Status(
                $movie->movieStatus->id,
                $movie->movieStatus->name
            ));
    }
    public function store(string $title, string $gender, string $time, string $premiere, int $movieStatus): void
    {
        AppMovie::create([
            'title' => $title,
            'gender' => $gender,
            'time' => $time,
            'premiere' => $premiere,
            'status_id' => $movieStatus
        ]);
    }
    public function update(): void {}
    public function delete(): void {}
}
