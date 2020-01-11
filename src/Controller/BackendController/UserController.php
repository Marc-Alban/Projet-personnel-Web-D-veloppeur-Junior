<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Controller\FrontendController\HomeController;
use App\Model\Manager\UserManager;
use App\View\View;

class UserController
{

    private $view;
    private $user;
    private $error;

    public function __construct()
    {
        $this->view = new View();
        $this->error = new HomeController();
        $this->user = new UserManager();
    }

    /**
     * Rendu de la page info utilisateur
     *
     * @return void
     */
    public function UserAction(array $data): void
    {
        // $mdpBdd = $this->user->getPass();

        // if (empty($data['session']['user']) && empty($data['session']['mdp']) && !password_verify($mdpBdd, $data['session']['mdp'])) {
        //     $this->error->errorAction();
        // }

        $this->view->renderer('Backend', 'loginUser', null);
    }

}