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
        } else if ($this->legende > 20) {
            $this->error = "Legende trop grand veuillez mettre moins de caractères";
        } else if (empty($this->tmpName)) {
            $this->error = 'Image obligatoire';
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
        $this->legende = htmlspecialchars(trim($data['post']['legende'])) ?? null;
        $this->tmpName = $data['files']['imageGraph']['tmp_name'] ?? null;
        $this->size = $data['files']['imageGraph']['size'] ?? null;
        $this->file = (empty($data['files']['imageGraph']['name'])) ? 'default.png' : $data['files']['imageGraph']['name'];
        $this->extention = strtolower(substr(strrchr($this->file, '.'), 1)) ?? null;
    }
/************************************End dataPost graph************************************************* */
/************************************Update graph Add********************************************************* */
/**
 * Met à jour en bdd un graph s'il n'ya pas d"erreur sinon renvoie error
 * Ou bien alors met à jour un lien sur la même page
 *
 * @return array
 */
    public function graphUpdate(array $data): ?array
    {

        $action = $data['get']['action'] ?? null;
        $id = $data['get']['id'] ?? null;
        $errors = $data['session']['errors'] ?? null;
        unset($data['session']['errors']);

        if ($id !== null) {
            $dataBdd = $this->homeRepository->readWithId($id);
            if ($dataBdd === null) {
                header('Location: http://projet5.marcalban/?p=table&liste=listeGraphiques');
                exit();
            }
            $idBdd = $dataBdd->getId();
        } else if ($id === null) {
            header('Location: http://projet5.marcalban/?p=table&liste=listeGraphiques');
            exit();
        }

        if (isset($action) && $action === 'update' && isset($id) && $id === $idBdd) {
            $this->dataPostGraph($data);
            if ($this->checkFielsGraph()) {
                $errors['errorImage'] = $errors . $this->error;
            }
            if (empty($errors)) {
                /*************Update**************** */
                $this->homeRepository->updateBddGraph($this->select, $this->legende, $this->tmpName, $this->extention, $id);
                $this->succesGraph();
                header('Location: http://projet5.marcalban/?p=table&liste=listeGraphiques&action=update');
                exit();
            }
            return $errors;
        }
        return null;
    }
/************************************End Update graph Add************************************************ */
/************************************Retourne donnée graph************************************************* */
    public function dataWithId(array $data)
    {
        $id = $data['get']['id'] ?? null;
        $dataBdd = $this->homeRepository->readWithId($id);
        return $dataBdd;
    }
/************************************End Retourne donnée graph************************************************* */
/************************************Retourne donnée succes graph************************************************* */
    public function succesGraph(): array
    {
        $succes['successGraph'] = "Article bien mis à jour";
        return $succes;
    }
/************************************End Retourne donnée succes graph************************************************* */

}