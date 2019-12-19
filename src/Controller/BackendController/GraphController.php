<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class GraphController extends View
{
    /**
     * Rendu des graphs
     *
     * @return void
     */
    public function graphAction(): void
    {
        $this->renderer('Backend', 'graph', null);
    }
}