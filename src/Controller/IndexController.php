<?php

namespace App\Controller;

use App\Model\Manager\IndexManager;
use App\View\View;

class IndexController extends View
{

    private $indexManager;

    public function __construct()
    {
        $this->indexManager = new IndexManager;
        parent::__construct();
    }

    public function homeAction()
    {
        $graph = $this->indexManager->listeGraph();
        $this->renderer('Frontend', 'home', ['graph' => $graph]);
    }

    public function modalAction($id)
    {
        $modal = $this->indexManager->modalGraph($id);
        $this->renderer('Frontend', 'home', ['modal' => $modal]);
    }

    public function errorAction()
    {
        $this->renderer('Frontend', '404', null);
    }
}