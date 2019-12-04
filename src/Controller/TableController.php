<?php

namespace App\Controller;

use App\View\View;

class TableController extends View
{
    public function listeTableAction()
    {
        echo $this->renderer('Backend', 'table', null);
    }
}