<?php

declare(strict_types=1);

namespace Src\Movie\Infrastructure\Controller;

use App\Http\Requests\Movie\StoreMovieRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Src\Movie\Application\DTO\MovieRequest;
use Src\Movie\Application\UseCase\MovieGet;
use Src\Movie\Application\UseCase\MovieGetAll;
use Src\Movie\Application\UseCase\MovieInsert;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{
    public function __construct(
        private MovieGetAll $movieGetAll,
        private MovieGet $movieGet,
        private MovieInsert $movieInsert,
    ) {}

    public function index(): JsonResponse
    {
        $getMoives = $this->movieGetAll->execute();
        return new JsonResponse($getMoives);
    }
    public function show(int $id): JsonResponse
    {
        $getMovie = $this->movieGet->execute($id);
        return new JsonResponse($getMovie);
    }
    public function store(StoreMovieRequest $request): JsonResponse
    {
        $this->movieInsert->execute(new MovieRequest(
            title:$request->title,
            gender:$request->gender,
            time:$request->time,
            premiere:$request->premiere,
            movieStatus:$request->status_id
        ));
        return new JsonResponse([
            'Insert new Movie', Response::HTTP_CREATED
        ]);
    }
}
