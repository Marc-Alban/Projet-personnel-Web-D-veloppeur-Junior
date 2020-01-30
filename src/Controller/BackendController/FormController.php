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
        if (!isset($data['session']['user']) && !isset($data['session']['active'][0]) && $data['session']['active'][0] !== 1) {
            header('Location: http://3bigbangbourse.fr/?p=home');
            exit();
        }
        $verif = $this->articleManager->verifForm($data);
        $dataForm = $this->articleManager->getDatasForm($data);
        $this->view->renderer('Backend', 'form', ['verif' => $verif, "dataForm" => $dataForm]);
    }
}