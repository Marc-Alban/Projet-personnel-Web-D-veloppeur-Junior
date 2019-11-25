<?php

namespace src\Model\Repository;

use src\Model\Database;

class Repository extends Database
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    public function readAll(string $table, ?string $other)
    {
        $sql = "SELECT * FROM" . $table . $other;
        $query = $this->pdo->query($sql);
        $query->fetchAll();
    }

    public function read($statement, $table)
    {
        $sql = "SELECT" . $statement . "FROM" . $table;
        $query = $this->pdo->query($sql);
        $query->fetch();
    }

    public function update($table, array $datas = [])
    {
        $sql = "UPDATE . $table . SET . $datas";
        $query = $this->pdo->prepare($sql);
        $query->execute($datas);
    }

    public function delete($table, array $datas = [])
    {
        $sql = "DELETE FROM . $table . WHERE " . $datas;
        $query = $this->pdo->prepare($sql);
        $query->execute($datas);
    }

    public function create(string $table, string $k, string $v)
    {
        $insert = [
            $k => $v,
        ];

        $sql = "INSERT INTO.$table.($k).VALUES.($v)";
        $query = $this->pdo->prepare($sql);
        $query->execute($insert);
    }
}