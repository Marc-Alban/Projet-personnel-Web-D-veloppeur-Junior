<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\PageManager;
use App\View\View;

class PageController extends View
{

    private $pageManager;

    /**
     * Fonction constructeur:
     * Récupère  la fonction parent construct "Twig/Environement"
     * de sa fille qui est la classe view, et instancie l'objet
     * PageManager dans une propriété
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->pageManager = new PageManager();
    }

    /**
     * Rendu des pages
     *
     * @return void
     */
    public function PageAction(array $session, array $data): void
    {
        $page = $this->pageManager->readPage($data['get']['title']);
        $this->renderer('Frontend', 'page', ['page' => $page]);
    }
}