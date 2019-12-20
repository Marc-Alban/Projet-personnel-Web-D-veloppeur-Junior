<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class TableController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Rendu des listes sous form de tableau
     *
     * @return void
     */
    public function TableAction(): void
    {
        $this->view->renderer('Backend', 'table', null);
    }
}