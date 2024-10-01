<?php

namespace App\Enums;

enum BillboardEnum:string
{
    case Billboard1 = '1';
    case Billboard2 = '2';
    
    public function roomId():string
    {
        return match($this){
            self::Billboard1 => '1',
            self::Billboard2 => '2',
        };
    }

    public function starDate():string
    {
        return match($this){
            self::Billboard1 => '2024-11-04',
            self::Billboard2 => '2024-10-01',
        };
    }

    public function endDate():string
    {
        return match($this){
            self::Billboard1 => '2024-12-12',
            self::Billboard2 => '2024-12-01',
        };
    }
}
