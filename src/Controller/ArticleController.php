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
        $listeArticle = $this->articleManager->listePost();
        $lastArticle = $this->articleManager->lastArticle();
        $this->renderer('Frontend', 'blog', ['listeArticle' => $listeArticle, 'lastArticle' => $lastArticle]);
    }

    public function postAction()
    {
        $post = $this->articleManager->post();
        $this->renderer('Frontend', 'article', ['post' => $post]);
    }

}