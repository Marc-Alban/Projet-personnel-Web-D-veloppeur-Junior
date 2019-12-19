<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class TableController extends View
{
    /**
     * Rendu des listes sous form de tableau
     *
     * @return void
     */
    public function TableAction(): void
    {
        $this->renderer('Backend', 'table', null);
    }
}