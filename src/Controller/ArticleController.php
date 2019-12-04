<?php

namespace App\Controller;

use App\View\View;

class ArticleController extends View
{
    public function listePostAction()
    {
        echo $this->renderer('Frontend', 'blog', null);
    }

    public function PostAction()
    {
        echo $this->renderer('Frontend', 'article', null);
    }

}