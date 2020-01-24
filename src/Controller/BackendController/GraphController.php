<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\HomeManager;
use App\View\View;

class GraphController
{
    private $view;
    private $homeManager;

    public function __construct()
    {
        $this->view = new View();
        $this->homeManager = new HomeManager();
    }

    /**
     * Rendu des graphs
     *
     * @return void
     */
    public function graphAction(array $data): void
    {

        $dataWithId = $this->homeManager->dataWithId($data);
        $graph = $this->homeManager->graphUpdate($data);
        $this->view->renderer('Backend', 'graph', ['graph' => $graph, 'dataWithId' => $dataWithId]);
    }
}