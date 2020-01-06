<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Controller\FrontendController\HomeController;
use App\View\View;

class GraphController
{
    private $view;
    private $error;

    public function __construct()
    {
        $this->view = new View();
        $this->error = new HomeController();
    }

    /**
     * Rendu des graphs
     *
     * @return void
     */
    public function graphAction(array $data): void
    {
        if (!empty($data['session']['pseudo']) || !empty($data['session']['mdp'])) {
            $this->view->renderer('Backend', 'graph', null);
        }
        $this->error->errorAction();
    }
}