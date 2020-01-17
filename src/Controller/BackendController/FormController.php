<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\ArticleManager;
use App\View\View;

class FormController
{
    private $view;
    private $articleManager;

    public function __construct()
    {
        $this->view = new View();
        $this->articleManager = new ArticleManager();
    }

    /**
     * Rendu des formulaires
     *
     * @return void
     */
    public function formAction(array $data): void
    {
        $verif = $this->articleManager->verifForm($data);

        $this->view->renderer('Backend', 'form', ['verif' => $verif]);
    }
}