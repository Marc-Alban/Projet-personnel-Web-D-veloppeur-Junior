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

    /************************************Page Page************************************************* */
    /**
     * Rendu des pages
     *
     * @return void
     */
    public function PageAction(array $data): void
    {
        $title = $data['get']['title'] ?? 'home';
        $id = $data['get']['id'] ?? null;
        $page = $this->pageManager->readPage($data);

        if (isset($title) && !empty($title) && $title === 'UpdatePage' && isset($id) && !empty($id)) {
            $updatePage = $this->pageManager->updateBddPage($data);
            $this->view->renderer('Backend', 'page', ['page' => $page, 'updatePage' => $updatePage]);
        }
        $this->view->renderer('Frontend', 'page', ['page' => $page]);
    }
    /************************************End Page page************************************************* */

}