<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Controller\FrontendController\HomeController;
use App\View\View;

class UserController
{

    private $view;
    private $error;

    public function __construct()
    {
        $this->view = new View();
        $this->error = new HomeController();
    }

    /**
     * Rendu de la page info utilisateur
     *
     * @return void
     */
    public function UserAction(array $data): void
    {
        if (!empty($data['session']['pseudo']) || !empty($data['session']['mdp'])) {
            $this->view->renderer('Backend', 'loginUser', null);
        }
        $this->error->errorAction();
    }
}