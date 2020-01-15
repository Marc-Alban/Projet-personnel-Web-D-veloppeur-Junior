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
    /************************************Page Blog************************************************* */
    /**
     * Retourne la liste des articles sur la page blog
     *
     * @return void
     */
    public function ListesArticlesAction(array $data): void
    {
        $lastArticle = $this->articleManager->lastArticle();
        if (isset($data['get']['years']) && !empty($data['get']['years'])) {
            $classement = $this->articleManager->classification($data);
        } else if (isset($data['get']['pp']) || !empty($data['get']['pp']) || empty($data['get']['pp'])) {
            $listeArticle = $this->articleManager->pagination($data);
        }

        $tabData = [
            'listeArticle' => $listeArticle ?? null,
            'lastArticle' => $lastArticle,
            'classement' => $classement ?? null,
        ];

        $this->view->renderer('Frontend', 'blog', $tabData);
    }
    /************************************End Page blog************************************************* */

}