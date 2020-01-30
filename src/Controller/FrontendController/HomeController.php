<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\HomeManager;
use App\Tools\GestionGlobal;
use App\Tools\Token;
use App\View\View;

class HomeController
{

    private $HomeManager;
    private $view;
    private $token;
    private $maSuperGlobale;
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
        $this->view = new View();
        $this->token = new Token();
        $this->maSuperGlobale = new GestionGlobal();

    }
    /************************************Page Acceuil************************************************* */

    /**
     * Renvoie la page d'index avec ou sans id
     *
     * @return void
     */
    public function HomeAction(): void
    {
        $this->maSuperGlobale->setParamSession('token', $this->token->createSessionToken());
        $graph = $this->HomeManager->listeGraph();
        $this->view->renderer('Frontend', 'home', ['graph' => $graph]);
    }
    /************************************End Page Accueil************************************************* */
    /************************************Page Error 404************************************************* */
    /**
     * Retourne la page 404
     *
     * @return void
     */
    public function errorAction(): void
    {
        $this->view->renderer('Frontend', '404', null);
    }
    /************************************End Page Error 404************************************************* */

}