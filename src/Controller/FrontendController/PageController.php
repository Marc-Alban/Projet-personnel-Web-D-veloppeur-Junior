<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\PageManager;
use App\View\View;

class PageController
{

    private $pageManager;
    private $view;

    /**
     * Fonction constructeur:
     * Récupère  la fonction parent construct "Twig/Environement"
     * de sa fille qui est la classe view, et instancie l'objet
     * PageManager dans une propriété
     *
     */
    public function __construct()
    {
        $this->pageManager = new PageManager();
        $this->view = new View();
    }

    /**
     * Rendu des pages
     *
     * @return void
     */
    public function PageAction(array $data): void
    {
        $page = $this->pageManager->readPage($data['get']['title']);
        $this->view->renderer('Frontend', 'page', ['page' => $page]);
    }
}