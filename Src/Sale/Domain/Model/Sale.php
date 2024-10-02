<?php
declare(strict_types=1);

namespace Src\Sale\Domain\Model;

class sale
{
    public function __construct(
        private int $id,
        private int $user_id,
    )
    {
        
    }
}