<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\PageRepository;
use PDOException;

class PageManager extends PDOException
{

    private $pageRepository;

    /**
     * Fonction constructeur, instanciation de l'pageRepository
     * dans la propriété pageRepository
     */
    public function __construct()
    {
        $this->pageRepository = new PageRepository();
    }
/************************************ Read Page ************************************************* */
    /**
     * Retourne la liste des graphs sur le controller page
     *
     * @return array
     */
    public function readPage(?array $data): ?array
    {
        $title = $data['get']['title'] ?? null;
        $page = $data['get']['p'] ?? null;
        $id = $data['get']['id'] ?? null;
        $pageId = [];
        if (isset($page) && !empty($page) && isset($title) && !empty($title) && isset($id) && !empty($id)) {
            $pageId[] = $this->pageRepository->readPageId($data);
            return $pageId;
        }
        $page = $this->pageRepository->readAll($title);
        return $page;
    }
/************************************End Read Page************************************************* */
/************************************ Update Page ************************************************* */
    /**
     * Verifie le formulaire de mise à jour des pages
     *
     * @return array
     */
    public function verifPageUpdate(array $data): void
    {
        $update = $data['get']['update'] ?? null;

        if (isset($update)) {
            $tmpName = $data['post']['imagePage'] ?? null;
            $namePage = $data['post']['namePage'] ?? null;
            $titlePage = $data['get']['titlePage'] ?? null;
            $bodyPage = $data['get']['bodyPage'] ?? null;

        }
    }
/************************************End Update Page************************************************* */
}