<?php

namespace App\Controller;

use twig;

class IndexController extends twig
{
    public function homeAction()
    {
        var_dump(new twig);
        //$this->renderer("home");
    }
}