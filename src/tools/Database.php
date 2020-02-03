<?php
declare (strict_types = 1);

namespace App\Tools;

use Exception;
use \PDO;

class Database
{
    const HOST = 'db5000285322.hosting-data.io';
    const DATABASE = 'dbs278576';
    const USER = 'dbu79211';
    const PASSWORD = '479c329d49fa8297ab78ed988EF.67512';
    private static $instance = null;

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
                $pdoOptions[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
                self::$instance = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DATABASE, self::USER, self::PASSWORD, $pdoOptions);
            }
            return self::$instance;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
/************************************End PDO Connexion************************************************* */
}