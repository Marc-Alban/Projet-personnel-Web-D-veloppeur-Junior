<?php

namespace App\Controller;

use App\View\View;

class UserController extends View
{
    public function loginUserAction()
    {
        $this->renderer('Backend', 'loginUser', null);
    }
}