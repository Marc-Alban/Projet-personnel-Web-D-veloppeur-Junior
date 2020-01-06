<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\ArticleManager;
use App\View\View;

class ListesArticlesController
{
    private $view;
    private $articleManager;

    /**
     * Fonction constructeur:
     * Récupère  la fonction parent construct "Twig/Environement"
     * de sa fille qui est la classe view, et instancie l'objet
     * Articlemanager dans une propriété
     *
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        $this->view = new View();
    }

    /**
     * Retourne la liste des articles sur la page blog
     *
     * @return void
     */
    public function ListesArticlesAction(array $data): void
    {
        $lastArticle = $this->articleManager->lastArticle();
        $listeArticle = $this->articleManager->pagination($data);

        $this->view->renderer('Frontend', 'blog', ['listeArticle' => $listeArticle, 'lastArticle' => $lastArticle]);
    }

}