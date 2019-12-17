<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\HomeRepository;

class HomeManager
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

}