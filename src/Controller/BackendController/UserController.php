<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class UserController
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }
/************************************Page Infos Users************************************************* */

    /**
     * Rendu de la page info utilisateur
     *
     * @return void
     */
    public function UserAction(): void
    {
        $this->view->renderer('Backend', 'loginUser', null);
    }
/************************************End Page Infos Users************************************************* */

}