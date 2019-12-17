<?php
declare (strict_types = 1);
namespace App\Controller;

use App\View\View;

class FormController extends View
{
    /**
     * Rendu des formulaires
     *
     * @return void
     */
    public function formAction(): void
    {
        $this->renderer('Backend', 'form', null);
    }
}