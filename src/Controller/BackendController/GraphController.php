<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class GraphController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Rendu des graphs
     *
     * @return void
     */
    public function graphAction(): void
    {
        $this->view->renderer('Backend', 'graph', null);
    }
}