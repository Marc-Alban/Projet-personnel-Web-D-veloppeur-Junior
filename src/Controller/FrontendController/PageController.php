<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\View\View;

class PageController extends View
{
    /**
     * Rendu des pages
     *
     * @return void
     */
    public function PageAction(): void
    {
        $this->renderer('Frontend', 'page', null);
    }
}