<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\ArticleRepository;

class ArticleManager
{

    private $articleRepository;

    /**
     * Fonction constructeur, instanciation de l'articlerepository
     * dans la propriété articleRepository
     */
    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    /**
     * Retourne la liste des articles dans un tableau
     * ou false si il n'y a rien
     *
     * @return array
     */
    public function listePost(): array
    {
        return $this->articleRepository->readAll();
    }

    /**
     * Retourne le dernier article dans un tableau
     * ou false si il n'y a rien
     *
     * @return Object
     *
     */
    public function lastArticle(): Object
    {
        return $this->articleRepository->last();
    }

    /**
     * Retourne un article avec un id selectionner
     *
     * @return Object
     */
    public function article(int $id): Object
    {
        return $this->articleRepository->read((int) $id);
    }

}