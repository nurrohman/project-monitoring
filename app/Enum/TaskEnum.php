<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

class TaskEnum extends Enum
{
    const DONE      = 'done';
    const NOT_DONE  = 'not_done';

    public static function getStatus(){
        return [
            self::DONE      => 'Selesai',
            self::NOT_DONE  => 'Belum Selesai'
        ];
    }
}
