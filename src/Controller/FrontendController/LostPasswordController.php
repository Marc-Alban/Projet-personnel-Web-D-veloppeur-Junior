<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\UserManager;
use App\Tools\GestionGlobal;
use App\Tools\Token;
use App\View\View;

class LostPasswordController
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
    /************************************Page Password Lost************************************************* */
    /**
     * Rendu de la page password perdu
     *
     * @return void
     */
    public function LostPasswordAction(array $data): void
    {
        $this->maSuperGlobale->setParamSession('token', $this->token->createSessionToken());
        $mailExist = $this->userManager->verifMail($data);
        $dataMail = $this->userManager->getMailForm($data);
        $tabData = [
            'mailExist' => $mailExist,
            'dataMail' => $dataMail,
        ];
        $this->view->renderer('Frontend', 'lost', $tabData);
    }
    /************************************End Page Password Lost************************************************* */

}