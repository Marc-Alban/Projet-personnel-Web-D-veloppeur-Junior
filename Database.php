<?php
declare (strict_types = 1);

namespace App\Tools;

use Exception;
use \PDO;

class Database
{
    const DSN = 'mysql:host=db5000285322.hosting-data.io;dbname=dbs278576;charset=utf8mb4';
    const USER = 'dbu79211';
    const PASSWORD = '479c329d49fa8297ab78ed988EF.67512';
    private static $instance = null;
    // const DSN = 'mysql:host=localhost;dbname=bmfinance;charset=utf8mb4';
    // const USER = 'root';
    // const PASSWORD = '';
    // private static $instance = null;

/************************************PDO Connexion************************************************* */
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
/************************************End PDO Connexion************************************************* */
}