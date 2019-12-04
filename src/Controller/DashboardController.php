<?php

namespace App\Controller;

use App\View\View;

class DashboardController extends View
{
    public function dashboardRenderAction()
    {
        $this->renderer('Backend', 'dashboard', null);
    }

}