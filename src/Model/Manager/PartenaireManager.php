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
/************************************nb Partenaire************************************************* */
    public function nbPartenaire(): int
    {
        $nbPartenaire = $this->partenaireRepository->countpartenaire();
        return (int) $nbPartenaire;
    }
/************************************End nb Partenaire************************************************* */
/************************************Verif Cahmp Add************************************************* */
    public function verifChampsPartenaire(): ?string
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
/************************************End Verif Cahmp Add************************************************* */
/************************************Factorisation Partenaire************************************************* */
    public function factorisationpartenaire($data)
    {
        $this->link = htmlentities(trim($data['post']['link'])) ?? null;
        $this->legende = htmlentities(trim($data['post']['legende'])) ?? null;
        $this->tmpName = $data['files']['imagePartenaire']['tmp_name'] ?? null;
        $this->size = $data['files']['imagePartenaire']['size'] ?? null;
        $this->file = $data['files']['imagePartenaire']['name'] ?? null;
        $this->extention = strtolower(substr(strrchr($this->file, '.'), 1)) ?? '.png';
    }
/************************************End Factorisation Partenaire************************************************* */
/************************************liste Partenaire Add********************************************************* */
    /**
     * Insert en bdd un nouveau partenaire s'il n'ya pas d"erreur sinon renvoie null
     * Ou bien alors met à jour un lien sur la même page
     *
     * @return array
     */
    public function partenaire(array $data): ?array
    {
        $update = null;
        $action = $data['get']['action'] ?? null;
        $id = $data['get']['id'] ?? null;
        $submit = $data['post']['submit'] ?? null;
        $errors = $data['session']['errors'] ?? null;
        unset($data['session']['errors']);
        /*************Send**************** */
        if ($action === 'send' && isset($submit)) {
            $this->factorisationpartenaire($data);
            if ($this->verifChampsPartenaire()) {
                $errors['errorMdp'] = $errors . $this->error;
            }
            if (empty($errors)) {
                $this->partenaireRepository->addBddPartenaire($this->legende, $this->tmpName, $this->link, $this->extention);
                $succes['successPartenaire'] = "Article bien enregistré";
                return $succes;
            }
            return $errors;
        }
        /*************Update**************** */
        if (isset($action) && $action === 'update' && isset($id) && isset($update)) {

        }
        return null;
    }
/************************************End Liste Partenaire Add************************************************* */

}