<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\HomeRepository;

class HomeManager
{

    private $homeRepository;
    private $select;
    private $tmpName;
    private $file;
    private $size;
    private $extention;
    private $legende;
    private $error;

    /**
     * Fonction constructeur, instanciation de l'homerepository
     * dans la propriété homeRepository
     */
    public function __construct()
    {
        $this->homeRepository = new HomeRepository();
    }
/************************************Liste Graph BDD************************************************* */
    /**
     * Retourne la liste des graphs sur le controller home
     *
     * @return array
     */
    public function listeGraph(): array
    {
        $graph = $this->homeRepository->readAll();
        return $graph;
    }
/************************************End Liste Graph BDD************************************************* */
/************************************check Fielsgraph************************************************* */
    public function checkFielsGraph(): ?string
    {
        $extentions = ['jpg', 'png', 'gif', 'jpeg'];
        $tailleMax = 2097152;

        if (empty($this->legende) && empty($this->tmpName)) {
            $this->error = 'Veuillez renseigner un contenu !';
        } else if (empty($this->legende)) {
            $this->error = "Veuillez mettre une legende";
        } else if (empty($this->tmpName)) {
            $this->error = 'Image obligatoire pour un partenaire ! ';
        } else if (!in_array($this->extention, $extentions)) {
            $this->error = 'Image n\'est pas valide! ';
        } else if ($this->size > $tailleMax) {
            $this->error = "Image trop grande, mettre une image en dessous de 2 MO ";
        }
        return $this->error;
    }
/************************************End check Fielsgraph************************************************* */
/************************************dataPost graph************************************************* */
    public function dataPostGraph($data): void
    {
        $this->select = $data['post']['selectGraph'];
        $this->legende = htmlentities(trim($data['post']['legende'])) ?? null;
        $this->tmpName = $data['files']['imageGraph']['tmp_name'] ?? null;
        $this->size = $data['files']['imageGraph']['size'] ?? null;
        $this->file = (empty($data['files']['imageGraph']['name'])) ? 'default.png' : $data['files']['imageGraph']['name'];
        $this->extention = strtolower(substr(strrchr($this->file, '.'), 1)) ?? null;
    }
/************************************End dataPost graph************************************************* */
/************************************liste graph Add********************************************************* */
/**
 * Insert en bdd un nouveau graph s'il n'ya pas d"erreur sinon renvoie null
 * Ou bien alors met à jour un lien sur la même page
 *
 * @return array
 */
    public function graph(array $data): ?array
    {
        $update = null;
        $action = $data['get']['action'] ?? null;
        $id = $data['get']['id'] ?? null;
        $submit = $data['post']['submit'] ?? null;
        $errors = $data['session']['errors'] ?? null;
        unset($data['session']['errors']);
        /*************Send**************** */
        if ($action === 'send' && isset($submit)) {
            $this->dataPostGraph($data);
            if ($this->checkFielsGraph()) {
                $errors['errorImage'] = $errors . $this->error;
            }
            if (empty($errors)) {
                $this->homeRepository->addBddGraph($this->select, $this->legende, $this->tmpName, $this->extention);
                $succes['successGraph'] = "Article bien enregistré";
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