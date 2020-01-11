<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Controller\FrontendController\HomeController;
use App\Model\Manager\PartenaireManager;
use App\View\View;

class TableController
{
    private $view;
    private $partenaireManager;
    private $error;

    public function __construct()
    {
        $this->view = new View();
        $this->error = new HomeController();
        $this->partenaireManager = new PartenaireManager();

    }

    /**
     * Rendu des listes sous form de tableau
     *
     * @return void
     */
    public function TableAction(array $data): void
    {
        // if (!empty($data['session']['pseudo']) || !empty($data['session']['mdp'])) {
        //     $this->error->errorAction();
        // }

        $partenaire = $this->partenaireManager->listePartenaire();

        $this->view->renderer('Backend', 'table', ['partenaire' => $partenaire]);
    }
}