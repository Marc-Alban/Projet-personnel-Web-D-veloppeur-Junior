<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\View\View;

class LostPasswordController extends View
{
    /**
     * Rendu de la page password perdu
     *
     * @return void
     */
    public function LostPasswordAction(): void
    {
        $this->renderer('Frontend', 'lost', null);
    }
}