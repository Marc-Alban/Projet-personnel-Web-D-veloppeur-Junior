<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Controller\FrontendController\HomeController;
use App\Model\Manager\UserManager;
use App\View\View;

class NewPasswordController
{
    private $view;
    private $userManager;
    private $home;

    public function __construct()
    {
        $this->view = new View();
        $this->userManager = new UserManager();
        $this->home = new HomeController();
    }

    /**
     * Rendu de la page nouveau password
     *
     * @return void
     */
    public function NewPasswordAction(array $data): void
    {
        if (!isset($data['get']['token']) || empty($data['get']['token'])) {
            $this->home->errorAction();
        }

        if (isset($data['get']['token']) || !empty($data['get']['token'])) {
            if ($this->userManager->verifUser($data) === null) {
                header('Location: http://3bigbangbourse.fr/?p=lostPassword');
            }

            $newPass = $this->userManager->changeMdp($data);
            $token = $this->userManager->token();
            $this->view->renderer('Frontend', 'new', ['newPass' => $newPass, 'token' => $token]);

        }

    }

}