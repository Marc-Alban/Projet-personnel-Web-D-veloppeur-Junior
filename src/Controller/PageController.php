<?php
declare (strict_types = 1);
namespace App\Controller;

use App\View\View;

class PageController extends View
{
    /**
     * Rendu des pages
     *
     * @return void
     */
    public function pageRenderAction(): void
    {
        $this->renderer('Frontend', 'page', null);
    }
}