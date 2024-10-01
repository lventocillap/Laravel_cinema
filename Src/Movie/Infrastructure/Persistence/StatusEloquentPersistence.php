<?php
declare(strict_types=1);

namespace Src\Movie\Infrastructure\Persistence;

use App\Models\MovieStatuses;
use Src\Movie\Domain\Exception\StatusNotFound;
use Src\Movie\Domain\Interface\StatusInterface;
use Src\Movie\Domain\Model\Status;

class StatusEloquentPersistence implements StatusInterface
{
    public function show($id):?Status
    {
        $status = MovieStatuses::find($id);
        if(!$status){
            return throw new StatusNotFound;
        }
        return new Status(
            $status->id,
            $status->name
        );
    }
}