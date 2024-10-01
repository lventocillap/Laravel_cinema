<?php
declare(strict_types=1);

namespace Src\Movie\Domain\Interface;

use Src\Movie\Domain\Model\Status;

interface StatusInterface
{
    public function show($id):?Status;
}