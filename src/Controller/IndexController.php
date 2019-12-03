<?php

namespace App\Controller;

use App\View\View;

class IndexController extends View
{
    public function homeAction()
    {
        $this->renderer('Frontend', 'home');
    }

}