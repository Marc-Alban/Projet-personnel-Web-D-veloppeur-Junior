<?php

namespace App\Controller;

use App\Model\Manager\ArticleManager;
use App\View\View;

class ArticleController extends View
{
    public function listePostAction()
    {
        $articleManager = new ArticleManager;
        //$articleManager->readAll();
        // var_dump($articleManager->readAll());
        // die();
        echo $this->renderer('Frontend', 'blog', null);
    }

    public function PostAction()
    {
        echo $this->renderer('Frontend', 'article', null);
    }

}