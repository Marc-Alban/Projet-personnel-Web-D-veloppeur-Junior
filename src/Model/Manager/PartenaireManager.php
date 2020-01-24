<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\PartenaireRepository;

class PartenaireManager
{
    private $partenaireRepository;
    private $legende;
    private $link;
    private $file;
    private $tmpName;
    private $size;
    private $error;
    private $extention;

    /**
     * Fonction constructeur, instanciation de l'homerepository
     * dans la propriété homeRepository
     */
    public function __construct()
    {
        $this->partenaireRepository = new PartenaireRepository();
    }

    /************************************liste Partenaire ReadALL************************************************* */
    /**
     * Retourne la liste des partenaires sur le controller home
     *
     * @return array
     */
    public function listePartenaire(): array
    {
        return $this->partenaireRepository->readAll();
    }
/************************************End Liste Partenaire ReadAll************************************************* */
    /************************************Partenaire ID************************************************* */
    /**
     * Retourne la liste des partenaires sur le controller home
     *
     * @return array
     */
    public function getDataBddPartenaire(int $id): ?object
    {
        return $this->partenaireRepository->readPartenaire($id);
    }
/************************************End Partenaire IDs************************************************* */
/************************************nb Partenaire************************************************* */
    public function nbPartenaire(): int
    {
        $nbPartenaire = $this->partenaireRepository->countpartenaire();
        return (int) $nbPartenaire;
    }
/************************************End nb Partenaire************************************************* */
/************************************check Field Add************************************************* */
    public function checkFieldsPartenaire(): ?string
    {
        $extentions = ['jpg', 'png', 'gif', 'jpeg'];
        $tailleMax = 2097152;

        if (empty($this->legende) && empty($this->link) && empty($this->tmpName)) {
            $this->error = 'Veuillez renseigner un contenu !';
        } else if (empty($this->legende)) {
            $this->error = "Veuillez mettre une legende";
        } else if (empty($this->link)) {
            $this->error = "Veuillez mettre un lien";
        } else if (empty($this->tmpName)) {
            $this->error = 'Image obligatoire pour un partenaire ! ';
        } else if (!in_array($this->extention, $extentions)) {
            $this->error = 'Image n\'est pas valide! ';
        } else if ($this->size > $tailleMax) {
            $this->error = "Image trop grande, mettre une image en dessous de 2 MO ";
        }
        return $this->error;
    }
/************************************End check Field Add************************************************* */
/************************************dataPost Partenaire************************************************* */
    public function dataPostPartenaire($data)
    {
        $this->link = htmlentities(trim($data['post']['link'])) ?? null;
        $this->legende = htmlentities(trim($data['post']['legende'])) ?? null;
        $this->tmpName = $data['files']['imagePartenaire']['tmp_name'] ?? null;
        $this->size = $data['files']['imagePartenaire']['size'] ?? null;
        $this->file = (empty($data['files']['imagePartenaire']['name'])) ? 'default.png' : $data['files']['imagePartenaire']['name'];
        $this->extention = strtolower(substr(strrchr($this->file, '.'), 1)) ?? null;
    }
/************************************End dataPost Partenaire************************************************* */
/************************************liste Partenaire Add********************************************************* */
    /**
     * Insert en bdd un nouveau partenaire s'il n'ya pas d"erreur sinon renvoie null
     * Ou bien alors met à jour un lien sur la même page
     *
     * @return array
     */
    public function partenaire(array $data, ?string $id): ?array
    {
        $action = $data['get']['action'] ?? null;
        $submit = $data['post']['submit'] ?? null;
        $errors = $data['session']['errors'] ?? null;
        unset($data['session']['errors']);

        if (isset($submit)) {
            $this->dataPostPartenaire($data);
            if ($this->checkFieldsPartenaire()) {
                $errors['errorImage'] = $errors . $this->error;
            }
            if (empty($errors)) {
                /*************Send**************** */
                if ($action === 'send' && $id === null) {
                    $this->partenaireRepository->addBddPartenaire($this->legende, $this->tmpName, $this->link, $this->extention, null);
                    $succes['successPartenaire'] = "Partenaire Enregistré";
                    /*************Update**************** */
                } else if ($action === 'update' && $id !== null) {
                    $this->partenaireRepository->addBddPartenaire($this->legende, $this->tmpName, $this->link, $this->extention, $id);
                    $succes['successUpdatePartenaire'] = "Partenaire Mise à jour";
                }
                return $succes;
            }
            return $errors;
        }
        return null;
    }
/************************************End Liste Partenaire Add************************************************* */
/************************************Del Liste Partenaire************************************************* */
    public function delPartenaireBdd(int $id): void
    {
        $this->partenaireRepository->deletePartenaire($id);
    }
/************************************End Del Liste Partenaire************************************************* */

}