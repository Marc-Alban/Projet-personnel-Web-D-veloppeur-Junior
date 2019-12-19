<?php
declare (strict_types = 1);

namespace App\Tools;

use Exception;
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

        try {
            if (self::$instance === null) {
                self::$instance = new PDO(self::DSN, self::USER, self::PASSWORD);
            }
            return self::$instance;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }
}