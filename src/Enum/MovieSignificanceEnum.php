<?php


namespace App\Enum;


class MovieSignificanceEnum
{
    const PRICIPAL = "principal";
    const SECONDARY = "secondaire";

    static $values = [
        self::PRICIPAL,
        self::SECONDARY,
    ];
}