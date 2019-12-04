<?php

namespace App\Controller;

use App\View\View;

class PasswordController extends View
{
    public function newPassAction()
    {
        echo $this->renderer('Frontend', 'new', null);
    }

    public function lostPassAction()
    {
        echo $this->renderer('Frontend', 'lost', null);
    }
}