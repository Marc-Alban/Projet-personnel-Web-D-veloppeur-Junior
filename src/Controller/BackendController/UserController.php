<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\UserManager;
use App\View\View;

class UserController
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
    public function UserAction(array $data): void
    {
        $userData = $this->userManager->dataFormBack($data);
        $this->view->renderer('Backend', 'loginUser', ['userData' => $userData]);
    }
/************************************End Page Infos Users************************************************* */

}