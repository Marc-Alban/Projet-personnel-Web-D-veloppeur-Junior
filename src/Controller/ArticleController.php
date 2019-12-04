<?php

namespace App\Controller;

use App\Model\Manager\ArticleManager;
use App\View\View;

class ArticleController extends View
{
    public function listePostAction()
    {
        $articleManager = new ArticleManager;
        $articles[] = $articleManager->readAll();
        // var_dump($articles);
        // die();
        echo $this->renderer('Frontend', 'blog', $articles);
    }

    public function PostAction()
    {
        echo $this->renderer('Frontend', 'article', null);
    }

    // public function createAction()
    // {
    //     $articleEntity = new Article;
    //     $articleEntity->setLastArticle($_POST['lastArticle'])
    //         ->setPosted($_POST['posted'])
    //         ->setDate('Now()')
    //         ->setImage($_FILES);
    // }

}