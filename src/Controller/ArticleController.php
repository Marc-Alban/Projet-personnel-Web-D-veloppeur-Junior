<?php

namespace App\Controller;

use App\Model\Manager\ArticleManager;
use App\View\View;

class ArticleController extends View
{

    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;
    }

    public function listsArticlesAction()
    {
        $articles = $this->articleManager->listePost();
        // var_dump($articles);
        // die();
        $this->renderer('Frontend', 'blog', ['article' => $articles]);
    }

    public function postAction()
    {
        $post = $this->articleManager->post();
        //$this->renderer('Frontend', 'article', ['post' => $post]);
    }

}