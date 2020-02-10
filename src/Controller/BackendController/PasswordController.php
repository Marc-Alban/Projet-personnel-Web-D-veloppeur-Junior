<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\UserManager;
use App\View\View;

class PasswordController
{

    private $view;
    private $userManager;

    public function __construct()
    {
        $this->view = new View();
        $this->userManager = new UserManager();
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
        $userData = $this->userManager->changeMdp($data);
        $this->view->renderer('Backend', 'password', ['userData' => $userData]);
    }
/************************************End Page Infos Users************************************************* */

}