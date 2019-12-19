<?php
declare (strict_types = 1);
namespace App\Controller;

use App\View\View;

class ContactController extends View
{
    /**
     * Rendu de la page contact
     *
     * @return void
     */
    public function contactRenderAction(): void
    {
        $this->renderer('Frontend', 'contact', null);
    }

}