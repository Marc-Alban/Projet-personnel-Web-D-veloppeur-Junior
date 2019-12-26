<?php
declare (strict_types = 1);

namespace App\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View extends Environment
{
    private $loader;

    /**
     * Fonction constructeur instanciant le constructeur parent
     * qui est twig environement
     */
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
     * @return void
     */
    public function renderer(string $path, string $view, ?array $data): void
    {
        $this->addGlobal('session', $_SESSION);
        echo $this->render($path . '/' . $view . '.html.twig', ['data' => $data]);
    }
}