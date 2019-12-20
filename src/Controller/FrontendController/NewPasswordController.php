<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\View\View;

class NewPasswordController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }
    /**
     * Rendu de la page nouveau password
     *
     * @return void
     */
    public function NewPasswordAction(): void
    {
        $this->view->renderer('Frontend', 'new', null);
    }

}