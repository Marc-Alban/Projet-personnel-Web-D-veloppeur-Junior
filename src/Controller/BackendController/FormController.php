<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class FormController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Rendu des formulaires
     *
     * @return void
     */
    public function formAction(): void
    {
        $this->view->renderer('Backend', 'form', null);
    }
}