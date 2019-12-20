<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\PageRepository;
use PDOException;

class PageManager extends PDOException
{

    private $pageRepository;

    /**
     * Fonction constructeur, instanciation de l'pageRepository
     * dans la propriété pageRepository
     */
    public function __construct()
    {
        $this->pageRepository = new PageRepository();
    }

    /**
     * Retourne la liste des graphs sur le controller page
     *
     * @return array
     */
    public function readPage(string $data): array
    {
        return $this->pageRepository->read($data);
    }

}