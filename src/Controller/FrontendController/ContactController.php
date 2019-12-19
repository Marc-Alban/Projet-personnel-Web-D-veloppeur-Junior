<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\View\View;

class ContactController extends View
{
    /**
     * Rendu de la page contact
     *
     * @return void
     */
    public function ContactAction(): void
    {
        $this->renderer('Frontend', 'contact', null);
    }

}