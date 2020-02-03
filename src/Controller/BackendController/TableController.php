<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\ArticleManager;
use App\Model\Manager\HomeManager;
use App\Model\Manager\PageManager;
use App\Model\Manager\PartenaireManager;
use App\View\View;

class TableController
{
    private $view;
    private $partenaireManager;
    private $articleManager;
    private $graph;
    private $pageManager;

    public function __construct()
    {
        $this->view = new View();
        $this->partenaireManager = new PartenaireManager();
        $this->articleManager = new ArticleManager();
        $this->graph = new HomeManager();
        $this->pageManager = new PageManager();
    }
/************************************Page table************************************************* */

    /**
     * Rendu des listes sous form de tableau
     *
     * @return void
     */
    public function TableAction(array $data): void
    {
        if (!isset($data['session']['user']) && !isset($data['session']['active'][0]) && $data['session']['active'][0] !== 1) {
            header('Location: http://projet5.marcalban/?p=home');
            exit();
        }
        $liste = $data['get']['liste'] ?? null;
        $perpage = $data['get']['perpage'] ?? null;
        $action = $data['get']['action'] ?? null;
        $id = $data['get']['id'] ?? null;
        $action = $data['get']['action'] ?? null;

        $idInt = (int) $id;
        $partenaire = null;
        $article = null;
        $graphique = null;
        $page = null;
        $pageSucces = null;
        $graph = null;
        $delArticle = null;
        $delPartenaire = null;

        if ($liste === "listePartenaires") {
            if ($action === "delete" && isset($idInt) && !empty($idInt) && is_int($idInt)) {
                $delPartenaire = $this->partenaireManager->delPartenaireBdd($idInt, $data);
            } else if ($idInt === false || $idInt === null || is_string($idInt)) {
                header("Location: http://projet5.marcalban/?p=table&liste=listePartenaires");
                exit();
            }
            $partenaire = $this->partenaireManager->listePartenaire();
        } else if ($liste === "listeArticlesBack" && isset($perpage)) {
            if ($action === "delete" && isset($idInt) && !empty($idInt) && is_int($idInt)) {
                $delArticle = $this->articleManager->delArticleBdd($idInt, $data);
            } else if ($idInt === false || $idInt === null || is_string($idInt)) {
                header("Location: http://projet5.marcalban/?p=table&liste=listeArticlesBack&perpage=1");
                exit();
            }
            $article = $this->articleManager->pagination($data);
        } else if ($liste === "listeGraphiques") {
            $graphique = $this->graph->listeGraph();
            if (isset($action) && $action === 'update' && $liste === 'listeGraphiques') {
                $graph = $this->graph->succesGraph();
            }
        } else if ($liste === "listePages") {
            $page = $this->pageManager->readPage(null);
            if (isset($action) && $action === 'update' && $liste === 'listePages') {
                $pageSucces = $this->pageManager->succesPage();
            }
        } else if (!isset($liste) || empty($liste)) {
            header("Location: http://projet5.marcalban/?p=dashboard&action=connexion");
            exit();
        }
        $this->view->renderer('Backend', 'table', ['partenaire' => $partenaire, "article" => $article, "delArticle" => $delArticle, "delPartenaire" => $delPartenaire, "graphique" => $graphique, 'graph' => $graph, "page" => $page, "pageSucces" => $pageSucces]);
    }
/************************************End Page Table************************************************* */

}