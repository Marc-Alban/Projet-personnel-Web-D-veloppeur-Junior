<?php

namespace App\Model;

use \PDO;

class Database
{
    private static $instance;

    public static function getPdo()
    {
        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;dbname=bmfinance;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }

        return self::$instance;
    }
}