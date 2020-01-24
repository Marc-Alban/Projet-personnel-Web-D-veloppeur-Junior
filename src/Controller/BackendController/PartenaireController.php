<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

// use App\Controller\FrontendController\HomeController;

use App\Model\Manager\PartenaireManager;
use App\View\View;

class PartenaireController
{
    private $view;
    private $partenaireManager;

    public function __construct()
    {
        $this->view = new View();
        $this->partenaireManager = new PartenaireManager();
    }

    /**
     * Rendu des partenaires
     *
     * @return void
     */
    public function PartenaireAction(array $data): void
    {
        $datapartenaire = null;
        $id = $data['get']['id'] ?? null;
        if ($id !== null) {
            $idInt = (int) $id;
            if ($idInt !== 0) {
                $datapartenaire = $this->partenaireManager->getDataBddPartenaire($idInt);
            }
            if ($datapartenaire === null) {
                header('Location: http://3bigbangbourse.fr/?p=table&liste=listePartenaires');
            }
        }
        $verifPartenaire = $this->partenaireManager->partenaire($data, $id);
        $this->view->renderer('Backend', 'partenaire', ['verifPartenaire' => $verifPartenaire, 'id' => $id, 'datapartenaire' => $datapartenaire]);
    }
}