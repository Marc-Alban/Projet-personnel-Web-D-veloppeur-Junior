<?php

namespace App\Controller;

use App\View\View;

class UserController extends View
{
    public function loginUserAction()
    {
        echo $this->renderer('Backend', 'loginUser', null);
    }
}