<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

// use App\Controller\FrontendController\HomeController;

use App\View\View;

class PartenaireController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Rendu des partenaires
     *
     * @return void
     */
    public function PartenaireAction(array $data): void
    {

        $this->view->renderer('Backend', 'partenaire', null);
    }
}