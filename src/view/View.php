<?php

namespace App\View;

class View
{
    private $view;

    public function renderer($path, $view)
    {
        return $this->view = $path . '/' . $view . '.html.twig';
    }
}