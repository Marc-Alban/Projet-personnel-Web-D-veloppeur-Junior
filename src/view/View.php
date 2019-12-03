<?php

namespace App\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// $loader = new FilesystemLoader('../templates');
// $twig = new Environment($loader);

class View extends Environment
{

    private $loader;

    public function renderer($path, $view)
    {
        $this->loader = new FilesystemLoader(VIEWS . '/' . $path . '/' . $view . '.html.twig');

        return $this->view->renderer($this->loader);
    }
}