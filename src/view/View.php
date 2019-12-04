<?php

namespace App\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View extends Environment
{
    private $loader;

    public function __construct()
    {
        $this->loader = new FilesystemLoader('../templates');
        parent::__construct($this->loader);
    }

    /**
     * Retourne la vue en fonction des paramètre passés
     *
     * @param string $path
     * @param string $view
     * @param array|null $data
     * @return string
     */
    public function renderer(string $path, string $view, ?array $data)
    {
        return $this->render($path . '/' . $view . '.html.twig', $data = []);
    }
}