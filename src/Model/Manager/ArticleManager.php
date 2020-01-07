<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Controller\FrontendController\HomeController;
use App\Model\Repository\ArticleRepository;

class ArticleManager
{

    private $articleRepository;
    private $error;

    /**
     * Fonction constructeur, instanciation de l'articlerepository
     * dans la propriété articleRepository
     */
    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->error = new HomeController();
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
    public function article(?int $id, ?array $data): Object
    {
        $id = $data['get']['id'] ?? null;
        if ($id === null || empty($id)) {

            return $this->articleRepository->last();
        }
        return $this->articleRepository->read((int) $id);
    }

    public function pagination(array $data)
    {
        $perPage = 5;
        $total = $this->articleRepository->countArticle();
        $nbPage = ceil($total / $perPage);
        $current = $data['get']['pp'] ?? null;

        if (!isset($data['get']['pp']) || empty($data['get']['pp']) || ctype_digit($data['get']['pp']) === false) {
            $current = 1;
        } else if ($data['get']['pp'] > $nbPage) {
            $current = $nbPage;
        }

        $firstOfPage = ($current - 1) * $perPage;

        return $tabArticle = [
            'current' => (int) $current,
            'nbPage' => (int) $nbPage,
            'articles' => $this->articleRepository->readAll($firstOfPage, $perPage),
        ];

    }

}