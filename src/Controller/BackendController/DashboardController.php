<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class DashboardController
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Rendu de la page dashboard
     *
     * @return void
     */
    public function DashboardAction(): void
    {
        $this->view->renderer('Backend', 'dashboard', null);
    }

}