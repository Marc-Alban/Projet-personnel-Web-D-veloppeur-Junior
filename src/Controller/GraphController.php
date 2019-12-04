<?php

namespace App\Controller;

use App\View\View;

class GraphController extends View
{
    public function graphRenderAction()
    {
        $this->renderer('Backend', 'graph', null);
    }
}