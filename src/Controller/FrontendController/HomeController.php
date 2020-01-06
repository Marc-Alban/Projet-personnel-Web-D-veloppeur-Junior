<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Controller\BackendController\DashboardController;
use App\Model\Manager\HomeManager;
use App\View\View;

class HomeController
{

    private $HomeManager;
    private $view;
    /**
     * Fonction constructeur:
     * Récupère  la fonction parent construct "Twig/Environement"
     * de sa fille qui est la classe view, et instancie l'objet
     * HomeManager dans une propriété
     *
     */
    public function __construct()
    {
        $this->HomeManager = new HomeManager();
        $this->dashbordController = new DashboardController;
        $this->view = new View();
    }

    /**
     * Renvoie la page d'index avec ou sans id
     *
     * @return void
     */
    public function HomeAction(): void
    {
        $graph = $this->HomeManager->listeGraph();
        $this->view->renderer('Frontend', 'home', ['graph' => $graph]);
    }

    /**
     * Retourne la page 404
     *
     * @return void
     */
    public function errorAction(): void
    {
        $this->view->renderer('Frontend', '404', null);
    }
}