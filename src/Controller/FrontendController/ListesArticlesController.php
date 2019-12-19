<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\ArticleManager;
use App\View\View;

class ListesArticlesController extends View
{

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
        parent::__construct();
        $this->articleManager = new ArticleManager();
    }

    /**
     * Retourne la liste des articles sur la page blog
     *
     * @return void
     */
    public function ListesArticlesAction(): void
    {
        $listeArticle = $this->articleManager->listePost();
        $lastArticle = $this->articleManager->lastArticle();
        $this->renderer('Frontend', 'blog', ['listeArticle' => $listeArticle, 'lastArticle' => $lastArticle]);
    }

}