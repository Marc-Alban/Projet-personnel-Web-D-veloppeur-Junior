<?php

namespace App\View;

abstract class View
{
    public function renderer($view)
    {
        require VIEWS . '/' . $view . '.php';
    }
}