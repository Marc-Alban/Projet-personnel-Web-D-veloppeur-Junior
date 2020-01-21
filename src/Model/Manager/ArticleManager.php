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
            // var_dump($this->articleRepository->last());
            // die();
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
            $articlesFront = $this->articleRepository->articleReadAll($firstOfPage, $perPage, 'readArticleAll');
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
            $articleAll = $this->articleRepository->articleReadAll($twoOfPage, $perPage, 'readAll');
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
        $submit = $data['post']['submit'] ?? null;
        $action = $data['get']['action'] ?? null;

        $errors = $data['session']['errors'] ?? null;
        unset($data['session']['errors']);

        if ($submit) {

            $this->dataFormArticle($data);

            $extentions = ['jpg', 'png', 'gif', 'jpeg'];

            if (empty($this->file) || $this->file === null) {
                $this->file = 'default.png';
            }

            $extention = strtolower(substr(strrchr($this->file, '.'), 1));
            $tailleMax = 2097152;

            //Nouvel article
            if ($action === 'newArticle') {
                if (empty($this->title) || empty($this->description)) {
                    $errors['contenu'] = 'Veuillez renseigner un contenu !';
                } else if (empty($this->title)) {
                    $errors['emptyTitle'] = "Veuillez mettre un titre";
                } else if (empty($this->description)) {
                    $errors['emptyDesc'] = "Veuillez mettre un paragraphe";
                } else if (empty($this->tmpName)) {
                    $errors['imageVide'] = 'Image obligatoire pour un article ! ';
                } else if (!in_array($extention, $extentions)) {
                    $errors['image'] = 'Image n\'est pas valide! ';
                } else if ($this->size > $tailleMax) {
                    $errors['size'] = "Image trop grande, mettre une image en dessous de 2 MO ";
                }
                if (empty($errors)) {
                    if ($this->lastArticle === 1) {
                        $this->articleRepository->updateLast();
                    }
                    $this->articleRepository->articleWrite($this->title, $this->legende, $this->description, $this->date, $this->posted, $this->lastArticle, $this->tmpName, $extention);
                    $succes['succesArticle'] = "Article bien enregistré";
                    return $succes;
                }
            }
            //Modification article
            if ($action === "articleModif") {
                $id = (int) $data['get']['id'];
                //$postManager->editChapter($id, $title, $description, $posted);
                if (!isset($file) || empty($file)) {
                    $errors['empty'] = 'Image manquante ! ';
                } else if (!in_array($extention, $extentions)) {
                    $errors['valide'] = 'Image n\'est pas valide! ';
                } else if (empty($errors)) {
                    //$postManager->editImageChapter($id, $title, $description, $tmpName, $extention, $posted);
                }
            }
            return $errors;
        }
        return null;
    }
    /************************************End Formulaire Article Vrefifcation Backend***************************** */
    /************************************Get Data Form Back************************************************* */
    /**
     * Renvoie les données à la vue
     * si rien retourne null
     *
     * @param array $data
     * @return array
     */
    public function getDatasForm(array $data): ?array
    {
        if (isset($data['post']['submit'])) {
            $this->dataFormArticle($data);
            $formData = [
                'title' => $this->title,
                'legende' => $this->legende,
                'description' => $this->description,
                'date' => $this->date,
                'posted' => $this->posted,
                'lastArticle' => $this->lastArticle,
            ];
            return $formData;
        }
        return null;
    }
    /************************************End Get Data Form Back************************************************* */
    /************************************Autres************************************************* */
    /**
     * Renvoie les données
     *
     * @param array $data
     * @return array
     */
    private function dataFormArticle(array $data): array
    {
        $tabData = [
            $this->title = htmlentities(trim($data['post']['title'])) ?? null,
            $this->legende = htmlentities(trim($data['post']['legende'])) ?? null,
            $this->description = htmlentities(trim($data['post']['description'])) ?? null,
            $this->date = $data['post']['date'] ?? null,
            $this->posted = (isset($data['post']['posted']) && $data['post']['posted'] === 'on') ? 1 : 0,
            $this->lastArticle = (isset($data['post']['lastArticle']) && $data['post']['lastArticle'] === 'on') ? 1 : 0,
            $this->tmpName = $data['files']['imageArticle']['tmp_name'] ?? null,
            $this->size = $data['files']['imageArticle']['size'] ?? null,
            $this->file = $data['files']['imageArticle']['name'] ?? null,
        ];
        return $tabData;
    }
    /************************************ Fin Autres************************************************* */

}