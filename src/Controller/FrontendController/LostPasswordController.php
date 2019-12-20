<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\View\View;

class LostPasswordController
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Rendu de la page password perdu
     *
     * @return void
     */
    public function LostPasswordAction(): void
    {
        $this->view->renderer('Frontend', 'lost', null);
    }
}