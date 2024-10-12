<?php

declare(strict_types=1);

namespace Src\Movie\Domain\Model;

class Movie
{

    public function __construct(
        private int $id,
        private string $title,
        private string $gender,
        private string $time,
        private string $premiere,
        private Status|int $movieStatus
    ) {}
    public function getId():int 
    {
        return $this->id;
    }
    public function getTitle():string
    {
        return $this->title;
    }
    public function getGender():string
    {
        return $this->gender;
    }
    public function getTime():string
    {
        return $this->time;
    }
    public function getPremiere():string
    {
        return $this->premiere;
    }
    public function getStatusId():Status|int
    {
        return $this->movieStatus;
    }
}
