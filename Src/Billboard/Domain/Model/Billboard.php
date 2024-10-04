<?php
declare(strict_types=1);

namespace Src\Billboard\Domain\Model;

use Src\Movie\Domain\Model\Movie;

class Billboard
{
    public function __construct(
        private int $id,
        private Movie $movieId,
        private int $roomId,
        private string $starDate,
        private string $endDate
    ){}
    public function getId():int
    {
        return $this->id;
    }
    public function getMovieId():Movie
    {
        return $this->movieId;
    }
    public function getRoomId():int
    {
        return $this->roomId;
    }
    public function getStarDate():string
    {
        return $this->starDate;
    }
    public function getEndDate():string
    {
        return $this->endDate;
    }
}