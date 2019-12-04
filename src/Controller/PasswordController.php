<?php

namespace App\Controller;

use App\View\View;

class PasswordController extends View
{
    public function newPassAction()
    {
        $this->renderer('Frontend', 'new', null);
    }

    public function lostPassAction()
    {
        $this->renderer('Frontend', 'lost', null);
    }
}