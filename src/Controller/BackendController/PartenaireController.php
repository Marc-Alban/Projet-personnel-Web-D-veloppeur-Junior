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
        if (!isset($data['session']['user']) && !isset($data['session']['active'][0]) && $data['session']['active'][0] !== 1) {
            header('Location: /?p=home');
            exit();
        }
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