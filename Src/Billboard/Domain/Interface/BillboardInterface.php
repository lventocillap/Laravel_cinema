<?php
declare(strict_types=1);

namespace Src\Billboard\Domain\Interface;

use Src\Billboard\Domain\Model\Billboard;

Interface BillboardInterface
{
    public function index():array;
    public function show($id):Billboard;
}





