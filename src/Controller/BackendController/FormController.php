<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Controller\FrontendController\HomeController;
use App\View\View;

class FormController
{
    private $view;
    private $error;

    public function __construct()
    {
        $this->view = new View();
        $this->error = new HomeController();
    }

    /**
     * Rendu des formulaires
     *
     * @return void
     */
    public function formAction(array $data): void
    {
        if (!empty($data['session']['pseudo']) || !empty($data['session']['mdp'])) {
            $this->view->renderer('Backend', 'form', null);
        }
        $this->error->errorAction();
    }
}