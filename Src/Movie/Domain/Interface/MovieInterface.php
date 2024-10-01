<?php
declare(strict_types=1);

namespace Src\Movie\Domain\Interface;

use Src\Movie\Domain\Model\Movie;

interface MovieInterface{

    public function index(): array;
    public function show(int $id): ?Movie;
    public function store(string $title,string $gender,string $time,string $premiere,int $movieStatus): void;
    public function update(): void;
    public function delete(): void;

}