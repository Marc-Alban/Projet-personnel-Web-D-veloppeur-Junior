<?php

namespace App\Model\Manager;

use App\Model\Repository\IndexRepository;

class IndexManager
{

    private $indexRepository;

    public function __construct()
    {
        $this->indexRepository = new IndexRepository;
    }

    public function listeGraph()
    {
        return $this->indexRepository->readAll();
    }

    public function modalGraph($id)
    {
        return $this->indexRepository->read($id);
    }

}