<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

// use App\Controller\FrontendController\HomeController;

use App\Model\Manager\PartenaireManager;
use App\View\View;

class PartenaireController
{
    private $view;
    private $partenaireManager;

    public function __construct()
    {
        $this->view = new View();
        $this->partenaireManager = new PartenaireManager();
    }

    /**
     * Rendu des partenaires
     *
     * @return void
     */
    public function PartenaireAction(array $data): void
    {
        $verifAndAddPartenaire = $this->partenaireManager->partenaire($data);
        $id = $data['get']['id'] ?? null;
        $this->view->renderer('Backend', 'partenaire', ['verifAndAddPartenaire' => $verifAndAddPartenaire, 'id' => $id]);
    }
}