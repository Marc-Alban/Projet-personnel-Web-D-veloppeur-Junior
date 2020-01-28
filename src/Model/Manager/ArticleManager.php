<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\ArticleRepository;

// use App\Tools\Token;

class ArticleManager
{
    private $articleRepository;
    private $title;
    private $legende;
    private $description;
    private $date;
    private $posted;
    private $lastArticle;
    private $file;
    private $tmpName;
    private $size;
    private $error;
    private $extention;

    /**
     * Fonction constructeur, instanciation de l'articlerepository
     * dans la propriété articleRepository
     */
    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    /******************************Get Post******************************* */
    /**
     * Retourne un article avec un id selectionner
     *
     * @return Object
     */
    public function getPost(?int $id, ?array $data): Object
    {
        $id = $data['get']['id'] ?? null;
        if ($id === null || empty($id)) {
            return $this->articleRepository->last();
        }
        return $this->articleRepository->read((int) $id);
    }
    /**************************End GetPost******************************* */
    /*************************Laste Article********************************** */
    /**
     * Retourne le dernier article dans un tableau
     * ou false si il n'y a rien
     *
     * @return Object
     *
     */
    public function lastArticle(): Object
    {
        return $this->articleRepository->last();
    }
    /*************************End Laste Article********************************** */
    /*************************Pagination********************************** */
    /**
     * Méthode pour la pagination des articles et l'affichage de tous les articles
     * sur la page blog
     *
     * @param array $data
     * @return array
     */
    public function pagination(array $data): array
    {
        $perPage = 4;
        $current = $data['get']['pp'] ?? null;
        $perCurrent = $data['get']['perpage'] ?? null;
        $articlesFront = null;
        $articleAll = null;

        if (isset($current)) {
            $total = $this->articleRepository->count('front');
            $nbPage = ceil($total / $perPage);
            if (!isset($current) || empty($current) || ctype_digit($current) === false || $current <= 0) {
                $current = 1;
            } else if ($current > $nbPage) {
                $current = $nbPage;
            }
            $firstOfPage = ($current - 1) * $perPage;
            $FofPage = (int) $firstOfPage;
            $articlesFront = $this->articleRepository->articleReadAll($FofPage, $perPage, 'readArticleAll');
        }

        if (isset($perCurrent)) {
            $total = $this->articleRepository->count('back');
            $nbPage = ceil($total / $perPage);
            if (!isset($perCurrent) || empty($perCurrent) || ctype_digit($perCurrent) === false || $perCurrent <= 0) {
                $perCurrent = 1;
            } else if ($perCurrent > $nbPage) {
                $perCurrent = $nbPage;
            }
            $twoOfPage = ($perCurrent - 1) * $perPage;
            $TofPage = (int) $twoOfPage;
            $articleAll = $this->articleRepository->articleReadAll($TofPage, $perPage, 'readAll');
        }

        return $tabArticle = [
            'current' => (int) $current,
            'perCurrent' => (int) $perCurrent,
            'nbPage' => (int) $nbPage,
            'articles' => $articlesFront,
            'articleAll' => $articleAll,
        ];

    }
    /*************************End Pagination********************************* */
    /*************************Classification********************************* */
    /**
     * Retourne les articles en fonctions des années passé dans l'url
     *
     * @param array $data
     * @return array
     */
    public function classificationGetYearsPost(array $data): array
    {
        $years = $data['get']['years'] ?? null;
        if (!isset($data['get']['years']) || empty($data['get']['years']) || ctype_digit($data['get']['years']) === false) {
            $years = 2019;
        }
        return $this->articleRepository->articleDate($years);
    }

    /************************************End Classification************************************************* */
    /************************************Dashboard Nombre post************************************************* */

    /**
     * Retourne le nombre d'article en bdd
     *
     * @return integer
     */
    public function nbPost(): int
    {
        $nbArticle = $this->articleRepository->count('back');
        return (int) $nbArticle;
    }
    /************************************End Dashboard Nombre post************************************************* */
    /************************************Formulaire Article Vrefifcation Backend**************************************** */
    public function verifForm(array $data): ?array
    {
        $action = $data['get']['action'] ?? null;
        $id = $data['get']['id'] ?? null;
        $submit = $data['post']['submit'] ?? null;
        $errors = $data['session']['errors'] ?? null;
        unset($data['session']['errors']);

        if (isset($submit)) {
            $this->dataFormArticle($data);
            if ($this->verifDataFormArticle()) {
                $errors['formData'] = $errors . $this->error;
            }
            if (empty($errors)) {
                //Nouvel article
                if ($action === 'newArticle') {
                    if ($this->lastArticle === 1) {
                        $this->articleRepository->updateLast();
                    }
                    $this->articleRepository->articleWrite($this->title, $this->legende, $this->description, $this->date, $this->posted, $this->lastArticle, $this->tmpName, $this->extention, null);
                    $succes['succesArticle'] = "Article bien enregistré";
                    return $succes;
                }
                //Modification article
                if ($action === "articleModif") {
                    $this->articleRepository->articleWrite($this->title, $this->legende, $this->description, $this->date, $this->posted, $this->lastArticle, $this->tmpName, $this->extention, $id);
                    $succes['succesArticle'] = "Article bien mise à jour";
                    return $succes;
                }
            }
            return $errors;
        }
        return null;
    }
    /************************************End Formulaire Article Vrefifcation Backend***************************** */
    /************************************Del Liste Article************************************************* */
    public function delArticleBdd(int $id): void
    {
        $this->articleRepository->deleteArticle($id);
    }
/************************************End Del Liste Partenaire************************************************* */
    /************************************Formulaire Article Vrefifcation data Backend***************************** */
    public function verifDataFormArticle(): ?string
    {
        $extentions = ['jpg', 'png', 'gif', 'jpeg'];
        $tailleMax = 2097152;

        if (empty($this->title) && empty($this->tmpName) && empty($this->description)) {
            $this->error = 'Veuillez renseigner un contenu !';
        } else if (empty($this->title)) {
            $this->error = "Veuillez mettre un titre";
        } else if (empty($this->legende)) {
            $this->error = "Veuillez mettre une legende";
        } else if (empty($this->description)) {
            $this->error = "Veuillez mettre un paragraphe";
        } else if (empty($this->tmpName)) {
            $this->error = 'Image obligatoire pour un article ! ';
        } else if (!in_array($this->extention, $extentions)) {
            $this->error = 'Image n\'est pas valide! ';
        } else if ($this->size > $tailleMax) {
            $this->error = "Image trop grande, mettre une image en dessous de 2 MO ";
        }
        return $this->error;
    }
    /************************************End Formulaire Article Vrefifcation data Backend***************************** */
    /************************************DataFormArticle************************************************* */
    /**
     * Renvoie les données
     *
     * @param array $data
     * @return array
     */
    public function dataFormArticle(array $data): void
    {
        $this->title = htmlentities(trim($data['post']['title'])) ?? null;
        $this->legende = htmlentities(trim($data['post']['legende'])) ?? null;
        $this->description = html_entity_decode(trim($data['post']['description'])) ?? null;
        $this->date = $data['post']['date'] ?? null;
        $this->posted = (isset($data['post']['posted']) && $data['post']['posted'] === 'on') ? 1 : 0;
        $this->lastArticle = (isset($data['post']['lastArticle']) && $data['post']['lastArticle'] === 'on') ? 1 : 0;
        $this->tmpName = $data['files']['imageArticle']['tmp_name'] ?? null;
        $this->size = $data['files']['imageArticle']['size'] ?? null;
        $this->file = (empty($data['files']['imagePartenaire']['name'])) ? 'default.png' : $data['files']['imagePartenaire']['name'];
        $this->extention = strtolower(substr(strrchr($this->file, '.'), 1)) ?? null;
    }
    /************************************End DataFormArticle************************************************* */
    /************************************Get Data Form Back************************************************* */
    /**
     * Renvoie les données à la vue
     * si rien retourne null
     *
     * @param array $data
     * @return array
     */
    public function getDatasForm(array $data): ?object
    {
        $action = $data['get']['action'] ?? null;
        $idInt = $data['get']['id'] ?? null;
        $id = (int) $idInt;

        if ($idInt !== null && isset($id) && !empty($id)) {
            $idBdd = $this->articleRepository->getIdBddArticle($idInt);
            if ($idInt === $idBdd['id']) {
                return $this->articleRepository->readBack($id);
            }
        }

        if ($action === "newArticle") {
            $this->dataFormArticle($data);
            $objectDataForm = (object) [
                "title" => $this->title,
                "legende" => $this->legende,
                "description" => $this->description,
                "date" => $this->date,
                "posted" => $this->posted,
                "lastArticle" => $this->lastArticle,
                "file" => $this->file,
            ];
            return $objectDataForm;
        }

        return null;
    }
    /************************************End Get Data Form Back************************************************* */

}