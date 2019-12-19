<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\View\View;

class UserController extends View
{
    /**
     * Rendu de la page info utilisateur
     *
     * @return void
     */
    public function UserAction(): void
    {
        $this->renderer('Backend', 'loginUser', null);
    }
}