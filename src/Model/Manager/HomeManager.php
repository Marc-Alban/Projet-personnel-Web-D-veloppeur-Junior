<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\HomeRepository;
use PDOException;

class HomeManager extends PDOException
{

    private $homeRepository;

    /**
     * Fonction constructeur, instanciation de l'homerepository
     * dans la propriété homeRepository
     */
    public function __construct()
    {
        $this->homeRepository = new HomeRepository();
    }

    /**
     * Retourne la liste des graphs sur le controller home
     *
     * @return array
     */
    public function listeGraph(): array
    {
        return $this->homeRepository->readAll();
    }

    public function modalGraph()
    {
        $donne = $this->homeRepository->readAll();
        $modalGraphs = [];
        foreach ($donne as $key) {
            $array = $key->getGraph();
            foreach ($array as $k => $value) {
                $modalGraphs[] = $value;
            }
        }
        return $modalGraphs;
    }

}