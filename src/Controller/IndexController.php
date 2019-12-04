<?php

namespace App\Controller;

use App\View\View;

class IndexController extends View
{
    public function homeRenderAction()
    {
        $this->renderer('Frontend', 'home', null);
    }

    public function errorAction()
    {
        $this->renderer('Frontend', '404', null);
    }
}