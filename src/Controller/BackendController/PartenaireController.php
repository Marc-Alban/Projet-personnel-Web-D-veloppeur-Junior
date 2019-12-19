<?php
declare (strict_types = 1);
namespace App\Controller;

use App\View\View;

class PartenaireController extends View
{
    /**
     * Rendu des partenaires
     *
     * @return void
     */
    public function createPartenaireAction(): void
    {
        $this->renderer('Backend', 'partenaire', null);
    }
}