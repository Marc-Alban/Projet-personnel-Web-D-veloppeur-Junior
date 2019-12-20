<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\View\View;

class ContactController
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Rendu de la page contact
     *
     * @return void
     */
    public function ContactAction(): void
    {
        $this->view->renderer('Frontend', 'contact', null);
    }

}