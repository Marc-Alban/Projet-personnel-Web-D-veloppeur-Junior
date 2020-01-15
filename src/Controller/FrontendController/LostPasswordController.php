<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\UserManager;
use App\View\View;

class LostPasswordController
{

    private $view;
    private $userManager;

    public function __construct()
    {
        $this->view = new View();
        $this->userManager = new UserManager();
    }
    /************************************Page Password Lost************************************************* */
    /**
     * Rendu de la page password perdu
     *
     * @return void
     */
    public function LostPasswordAction(array $data): void
    {
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