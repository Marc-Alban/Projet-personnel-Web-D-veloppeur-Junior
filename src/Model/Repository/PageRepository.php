<?php
declare (strict_types = 1);
namespace App\Model\Repository;

use App\Model\Entity\Page;
use App\Tools\Database;

class PageRepository
{

    private $pdo;
    private $pdoStatement;

    /**
     * Fonction constructeur, instanciation de la bdd
     * dans la propriété pdo
     */
    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    /**
     * Récupère tous les objets PAge
     *
     * @return bool|Page|null
     * false si l'objet n'a pu être inséré, objet Page si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function read(string $data): array
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM page WHERE posted = 1");
        $pages = [];
        while ($page = $this->pdoStatement->fetchObject(Page::class)) {
            $title = strtolower(str_replace(' ', '', $page->getTitlePage()));
            if ($data === $title) {
                $pages[] = $page;
            }

        }

        return $pages;
    }

}