<?php

namespace App\Model\Manager;

use App\Model\Repository\ArticleRepository;

class ArticleManager
{

    private $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository;
    }

    public function listePost()
    {
        return $this->articleRepository->readAll();
    }

    public function lastArticle()
    {
        $lastId = $this->articleRepository->lastId();
        return $this->articleRepository->read($lastId);
    }

    public function post()
    {
        return $this->articleRepository->read(5);
    }

}