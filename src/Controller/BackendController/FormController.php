<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\ArticleManager;
use App\Tools\GestionGlobal;
use App\Tools\Token;
use App\View\View;

class FormController
{
    private $view;
    private $articleManager;
    private $token;
    private $maSuperGlobale;

    public function __construct()
    {
        $this->view = new View();
        $this->articleManager = new ArticleManager();
        $this->token = new Token();
        $this->maSuperGlobale = new GestionGlobal();
    }

    /**
     * Rendu des formulaires
     *
     * @return void
     */
    public function formAction(array $data): void
    {
        if (!isset($data['session']['user']) && !isset($data['session']['active'][0]) && $data['session']['active'][0] !== 1) {
            header('Location: /?p=home');
            exit();
        }
        $this->maSuperGlobale->setParamSession('token', $this->token->createSessionToken());
        $verif = $this->articleManager->verifForm($data);
        $dataForm = $this->articleManager->getDatasForm($data);
        $this->view->renderer('Backend', 'form', ['verif' => $verif, "dataForm" => $dataForm]);
    }
}