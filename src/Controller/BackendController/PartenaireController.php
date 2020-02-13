<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\PartenaireManager;
use App\Tools\GestionGlobal;
use App\Tools\Token;
use App\View\View;

class PartenaireController
{
    private $view;
    private $partenaireManager;
    private $token;
    private $maSuperGlobale;

    public function __construct()
    {
        $this->view = new View();
        $this->partenaireManager = new PartenaireManager();
        $this->token = new Token();
        $this->maSuperGlobale = new GestionGlobal();
    }

    /**
     * Rendu des partenaires
     *
     * @return void
     */
    public function PartenaireAction(array $data): void
    {
        if (!isset($data['session']['user']) && !isset($data['session']['active'][0]) && $data['session']['active'][0] !== 1) {
            header('Location: /?p=home');
            exit();
        }
        $this->maSuperGlobale->setParamSession('token', $this->token->createSessionToken());
        $datapartenaire = null;
        $id = $data['get']['id'] ?? null;
        if ($id !== null) {
            $idInt = (int) $id;
            if ($idInt !== 0) {
                $datapartenaire = $this->partenaireManager->getDataBddPartenaire($idInt);
            }
            if ($datapartenaire === null) {
                header('Location: index.php?p=table&liste=listePartenaires');
                exit();
            }
        }
        $verifPartenaire = $this->partenaireManager->partenaire($data, $id);
        $this->view->renderer('Backend', 'partenaire', ['verifPartenaire' => $verifPartenaire, 'id' => $id, 'datapartenaire' => $datapartenaire]);
    }
}