<?php

declare(strict_types=1);

namespace Src\Movie\Application\UseCase;

use Src\Movie\Application\DTO\MovieRequest;
use Src\Movie\Domain\Interface\MovieInterface;

class MovieInsert
{
    public function __construct(
        private MovieInterface $movieInterface,
    ) {}
    public function execute(MovieRequest $request):void
    {
        $this->movieInterface->store(
            title:$request->title,
            gender:$request->gender,
            time:$request->time,
            premiere:$request->premiere,
            movieStatus:$request->movieStatus
        );
    }
}
