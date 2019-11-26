<?php
namespace App\Model\Entity;

use src\Model\Repository\Repository;

class Graph extends Repository
{
    //Récupère les graphs
    public function graphs()
    {
        $graph = $this->readAll(" graph ", " ORDER BY id ASC LIMIT 4");
        return $graph;
    }
}