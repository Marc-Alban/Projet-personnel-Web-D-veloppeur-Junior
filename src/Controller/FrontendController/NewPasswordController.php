<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Controller\FrontendController\HomeController;
use App\Model\Manager\UserManager;
use App\View\View;

class NewPasswordController
{
    private $view;
    private $error;
    private $userManager;

    public function __construct()
    {
        $this->view = new View();
        $this->error = new HomeController();
        $this->userManager = new UserManager();
    }

    /**
     * Rendu de la page nouveau password
     *
     * @return void
     */
    public function NewPasswordAction(array $data): void
    {
        if ($this->userManager->verifUser($data) === null || !isset($data['get']['token'])) {
            header('Location: http://3bigbangbourse.fr/?p=lostPassword');
        }
        $newPass = $this->userManager->changeMdp($data);
        $this->view->renderer('Frontend', 'new', ['newPass' => $newPass]);
        // $this->error->errorAction();
    }

}