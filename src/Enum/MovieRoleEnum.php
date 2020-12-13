<?php


namespace App\Enum;


class MovieRoleEnum
{
    const ACTOR = "acteur";
    const ACTRESS = "actrice";
    const DIRECTOR = "réalisateur";
    const PRODUCER = "producteur";

    static $values = [
        self::ACTOR,
        self::ACTRESS,
        self::DIRECTOR,
        self::PRODUCER
    ];
}