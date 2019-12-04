<?php

namespace App\Controller;

use App\View\View;

class PartenaireController extends View
{
    public function createPartenaireAction()
    {
        $this->renderer('Backend', 'partenaire', null);
    }
}