<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class FormController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Rendu des formulaires
     *
     * @return void
     */
    public function formAction(array $data): void
    {
        // $tokenSession = $data['session']['token'];
        // if (empty($tokenSession) || !isset($tokenSession) || $tokenSession !== ) {
        //     $this->view->renderer('Frontend', '404', null);
        //     exit();
        // }

        $this->view->renderer('Backend', 'form', null);
    }
}