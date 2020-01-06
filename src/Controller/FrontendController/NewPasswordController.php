<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Controller\FrontendController\HomeController;
use App\View\View;

class NewPasswordController
{
    private $view;
    private $error;

    public function __construct()
    {
        $this->view = new View();
        $this->error = new HomeController();
    }
    /**
     * Rendu de la page nouveau password
     *
     * @return void
     */
    public function NewPasswordAction(array $data): void
    {
        if (!empty($data['session']['mdp'])) {
            $this->view->renderer('Frontend', 'new', null);
        }
        $this->error->errorAction();
    }

}