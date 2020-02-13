<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\HomeManager;
use App\Tools\GestionGlobal;
use App\Tools\Token;
use App\View\View;

class GraphController
{
    private $view;
    private $homeManager;
    private $token;
    private $maSuperGlobale;

    public function __construct()
    {
        $this->view = new View();
        $this->homeManager = new HomeManager();
        $this->token = new Token();
        $this->maSuperGlobale = new GestionGlobal();
    }

    /**
     * Rendu des graphs
     *
     * @return void
     */
    public function graphAction(array $data): void
    {
        if (!isset($data['session']['user']) && !isset($data['session']['active'][0]) && $data['session']['active'][0] !== 1) {
            header('Location: /?p=home');
            exit();
        }
        $this->maSuperGlobale->setParamSession('token', $this->token->createSessionToken());
        $dataWithId = $this->homeManager->dataWithId($data);
        $graph = $this->homeManager->graphUpdate($data);
        $this->view->renderer('Backend', 'graph', ['graph' => $graph, 'dataWithId' => $dataWithId]);
    }
}