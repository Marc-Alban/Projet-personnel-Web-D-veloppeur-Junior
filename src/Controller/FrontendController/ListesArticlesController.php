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
            $classement = $this->articleManager->classificationGetYearsPost($data);
        } else if (isset($data['get']['pp']) || !empty($data['get']['pp'])) {
            $paginationListeArticle = $this->articleManager->pagination($data);
        } else if (!isset($data['get']['pp']) || empty($data['get']['pp'])) {
            header("Location: http://3bigbangbourse.fr/?p=listesArticles&pp=1");
            exit();

        }

        $tabData = [
            'paginationListeArticle' => $paginationListeArticle ?? null,
            'classement' => $classement ?? null,
            'lastArticle' => $lastArticle,
        ];

        $this->view->renderer('Frontend', 'blog', $tabData);
    }
    /************************************End Page blog************************************************* */

}