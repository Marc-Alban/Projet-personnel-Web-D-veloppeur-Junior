<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Controller\FrontendController\HomeController;
use App\Model\Manager\UserManager;
use App\Tools\GestionGlobal;
use App\Tools\Token;
use App\View\View;

class NewPasswordController
{
    private $view;
    private $userManager;
    private $home;
    private $token;
    private $maSuperGlobale;

    public function __construct()
    {
        $this->view = new View();
        $this->userManager = new UserManager();
        $this->home = new HomeController();
        $this->token = new Token();
        $this->maSuperGlobale = new GestionGlobal();
    }
    /************************************Page New Password************************************************* */

    /**
     * Rendu de la page nouveau password
     *
     * @return void
     */
    public function NewPasswordAction(array $data): void
    {
        $this->maSuperGlobale->setParamSession('token', $this->token->createSessionToken());
        if (!isset($data['get']['token']) || empty($data['get']['token'])) {
            $this->home->errorAction();
        }
        if (isset($data['get']['token']) || !empty($data['get']['token'])) {
            if ($this->userManager->verifUser($data) === null) {
                header('Location: index.php?p=lostPassword');
                exit();
            }
            $newPass = $this->userManager->changeMdp($data);
            $token = $this->userManager->getTokenBdd();
            $this->view->renderer('Frontend', 'new', ['newPass' => $newPass, 'token' => $token]);
        }
    }
    /************************************ End Page New password************************************************* */

}