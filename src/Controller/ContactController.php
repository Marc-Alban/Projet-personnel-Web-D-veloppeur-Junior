<?php

namespace App\Controller;

use App\View\View;

class ContactController extends View
{
    public function contactRenderAction()
    {
        $this->renderer('Frontend', 'contact', null);
    }

}