<?php

namespace App\Enums;

enum SeatEnum:string
{
    case seat1 ='A1';
    case seat2 ='A2';
    case seat3 ='A3';
    case seat4 ='A4';
    case seat5 ='A5';

    public function roomId():string
    {
        return match($this){
            self::seat1 => '1',
            self::seat2 => '1',
            self::seat3 => '1',
            self::seat4 => '1',
            self::seat5 => '1',
        };
    }

    public function status():string
    {
        return match($this){
            self::seat1 => 1,
            self::seat2 => 1,
            self::seat3 => 1,
            self::seat4 => 1,
            self::seat5 => 1,
        };
    }
}
