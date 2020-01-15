<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\PartenaireRepository;

class PartenaireManager
{
    private $partenaireRepository;

    /**
     * Fonction constructeur, instanciation de l'homerepository
     * dans la propriété homeRepository
     */
    public function __construct()
    {
        $this->partenaireRepository = new PartenaireRepository();
    }

    /************************************liste Partenaire ReadALL************************************************* */
    /**
     * Retourne la liste des partenaire sur le controller home
     *
     * @return array
     */
    public function listePartenaire(): array
    {
        return $this->partenaireRepository->readAll();
    }
/************************************End Liste Partenaire ReadAll************************************************* */
}