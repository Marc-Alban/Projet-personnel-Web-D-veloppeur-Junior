<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Controller\FrontendController\HomeController;
use App\View\View;

class TableController
{
    private $view;
    private $error;

    public function __construct()
    {
        $this->view = new View();
        $this->error = new HomeController();
    }

    /**
     * Rendu des listes sous form de tableau
     *
     * @return void
     */
    public function TableAction(array $data): void
    {
        if (!empty($data['session']['mdp'])) {
            $this->view->renderer('Backend', 'table', null);
        }
        $this->error->errorAction();
    }
}