<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\ArticleManager;
use App\View\View;

class ArticleController extends View
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
     * Retourne un article sur la page article cibler par l'id passé en paramètre
     *
     * @return void
     */
    public function ArticleAction(array &$session, array $data): void
    {
        $post = $this->articleManager->article((int) $data['get']['id']);
        $this->renderer('Frontend', 'article', ['post' => $post]);
    }

}