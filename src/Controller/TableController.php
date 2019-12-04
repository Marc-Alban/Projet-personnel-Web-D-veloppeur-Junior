<?php

namespace App\Controller;

use App\View\View;

class TableController extends View
{
    public function listeTableAction()
    {
        $this->renderer('Backend', 'table', null);
    }
}