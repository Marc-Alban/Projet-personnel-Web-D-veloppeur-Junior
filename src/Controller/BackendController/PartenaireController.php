<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Controller\FrontendController\HomeController;
use App\View\View;

class PartenaireController
{
    private $view;
    private $error;

    public function __construct()
    {
        $this->view = new View();
        $this->error = new HomeController();
    }

    /**
     * Rendu des partenaires
     *
     * @return void
     */
    public function PartenaireAction(array $data): void
    {
        if (!empty($data['session']['mdp'])) {
            $this->view->renderer('Backend', 'partenaire', null);
        }
        $this->error->errorAction();
    }
}