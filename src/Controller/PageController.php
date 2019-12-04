<?php

namespace App\Controller;

use App\View\View;

class PageController extends View
{
    public function pageRenderAction()
    {
        echo $this->renderer('Frontend', 'page', null);
    }
}