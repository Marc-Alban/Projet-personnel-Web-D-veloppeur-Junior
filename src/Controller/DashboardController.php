<?php

namespace App\Controller;

use App\View\View;

class DashboardController extends View
{
    public function dashboardRenderAction()
    {
        echo $this->renderer('Backend', 'dashboard', null);
    }

}