<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class DashboardController extends View
{
    /**
     * Rendu de la page dashboard
     *
     * @return void
     */
    public function dashboardRenderAction(): void
    {
        $this->renderer('Backend', 'dashboard', null);
    }

}