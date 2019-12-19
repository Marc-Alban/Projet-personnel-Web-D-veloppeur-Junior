<?php
declare (strict_types = 1);
namespace App\Controller;

use App\View\View;

class UserController extends View
{
    /**
     * Rendu de la page info utilisateur
     *
     * @return void
     */
    public function loginUserAction(): void
    {
        $this->renderer('Backend', 'loginUser', null);
    }
}