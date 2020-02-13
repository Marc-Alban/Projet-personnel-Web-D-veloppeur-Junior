<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\UserManager;
use App\Tools\GestionGlobal;
use App\Tools\Token;
use App\View\View;

class PasswordController
{

    private $view;
    private $userManager;
    private $token;
    private $maSuperGlobale;

    public function __construct()
    {
        $this->view = new View();
        $this->userManager = new UserManager();
        $this->token = new Token();
        $this->maSuperGlobale = new GestionGlobal();
    }
/************************************Page Infos Users************************************************* */

    /**
     * Rendu de la page info utilisateur
     *
     * @return void
     */
    public function PasswordAction(array $data): void
    {
        if (!isset($data['session']['user']) && !isset($data['session']['active'][0]) && $data['session']['active'][0] !== 1) {
            header('Location: /?p=home');
            exit();
        }
        $this->maSuperGlobale->setParamSession('token', $this->token->createSessionToken());
        $userData = $this->userManager->changeMdp($data);
        $this->view->renderer('Backend', 'password', ['userData' => $userData]);
    }
/************************************End Page Infos Users************************************************* */

}