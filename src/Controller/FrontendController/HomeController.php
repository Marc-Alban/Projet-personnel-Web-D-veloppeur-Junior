<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\HomeManager;
use App\View\View;

class HomeController extends View
{

    private $HomeManager;

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
        parent::__construct();
    }

    /**
     * Renvoie la page d'index avec ou sans id
     *
     * @return void
     */
    public function HomeAction(): void
    {
        $graph = $this->HomeManager->listeGraph();
        $this->renderer('Frontend', 'home', ['graph' => $graph]);
    }

    /**
     * Retourne la page 404
     *
     * @return void
     */
    public function errorAction(): void
    {
        $this->renderer('Frontend', '404', null);
    }
}