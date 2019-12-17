<?php

namespace App\Tools;

use \PDO;

class Database
{
    const DSN = 'mysql:host=localhost;dbname=bmfinance';
    const USER = 'root';
    const PASSWORD = '';
    private static $instance = null;

    /**
     * Retourne la base de donnée si elle n'existe pas
     * Sinon reprend la bdd existante
     *
     * @return PDO
     */
    public static function getPdo(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(self::DSN, self::USER, self::PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }

        return self::$instance;
    }
}