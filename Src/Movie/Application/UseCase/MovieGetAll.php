<?php

declare(strict_types=1);

namespace Src\Movie\Application\UseCase;

use Src\Movie\Application\DTO\MovieResponse;
use Src\Movie\Application\DTO\StatusResponse;
use Src\Movie\Domain\Interface\MovieInterface;

class MovieGetAll
{
    public function __construct(
        private MovieInterface $movieInterface
    ) {}

    public function execute(): array
    {
        $movies = $this->movieInterface->index();
        return array_map(function($movie){
            return new MovieResponse(
                id:$movie->getId(),
                title:$movie->getTitle(),
                gender:$movie->getGender(),
                time:$movie->getTime(),
                premiere:$movie->getPremiere(),
                statusId: new StatusResponse(
                    id:$movie->getStatusId()->getId(),
                    name:$movie->getStatusId()->getName())
            );
        },$movies);
    }
}
