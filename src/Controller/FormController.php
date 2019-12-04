<?php

namespace App\Controller;

use App\View\View;

class FormController extends View
{
    public function formAction()
    {
        $this->renderer('Backend', 'form', null);
    }
}