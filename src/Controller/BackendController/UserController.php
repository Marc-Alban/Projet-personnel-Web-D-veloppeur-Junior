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
        if (!isset($data['session']['user']) && !isset($data['session']['active'][0]) && $data['session']['active'][0] !== 1) {
            header('Location: /?p=home');
            exit();
        }
        $dataFormUser = null;
        $userData = $this->userManager->dataFormBack($data);
        if (isset($data['get']['action'])) {
            $dataFormUser = $this->userManager->FormUser($data);
        }
        $this->view->renderer('Backend', 'loginUser', ['userData' => $userData, 'dataFormUser' => $dataFormUser]);
    }
/************************************End Page Infos Users************************************************* */
/************************************Users Log Out ************************************************* */
/**
 * Permet la déconnexion de l'utilisateur
 * Supprime la session en court
 *
 * @return void
 */
    public function logoutUser(): void
    {
        session_destroy();
    }
/************************************End Users Log Out ************************************************* */

}