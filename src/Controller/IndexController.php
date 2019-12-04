<?php

namespace App\Controller;

use App\View\View;

class IndexController extends View
{
    public function homeRenderAction()
    {
        echo $this->renderer('Frontend', 'home', null);
    }

    public function errorAction()
    {
        echo $this->renderer('Frontend', '404', null);
    }
}