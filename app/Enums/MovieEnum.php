<?php

namespace App\Enums;

enum MovieEnum:string
{
    case Movie1= 'ALIEN';
    case Movie2= 'Prometeus';

    public function gender()
    {
        return match($this){
            self::Movie1 => 'Fiction',
            self::Movie2 => 'Fiction',
        };
    }
    public function time()
    {
        return match($this){
            self::Movie1 => '02:30',
            self::Movie2 => '02:00',
        };
    }
    public function premiere()
    {
        return match($this){
            self::Movie1 => '2024-12-03',
            self::Movie2 => '2024-11-03',
        };
    }
    public function status()
    {
        return match($this){
            self::Movie1 => 1,
            self::Movie2 => 2,
        };
    }
}
