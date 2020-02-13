<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\ContactManager;
use App\Tools\GestionGlobal;
use App\Tools\Token;
use App\View\View;

class ContactController
{

    private $view;
    private $contactManager;
    private $token;
    private $maSuperGlobale;

    public function __construct()
    {
        $this->view = new View();
        $this->contactManager = new ContactManager();
        $this->token = new Token();
        $this->maSuperGlobale = new GestionGlobal();
    }

    /************************************Page Contact************************************************* */

    /**
     * Rendu de la page contact
     *
     * @return void
     */
    public function ContactAction(?array $data): void
    {
        $this->maSuperGlobale->setParamSession('token', $this->token->createSessionToken());
        $message = $this->contactManager->verifFormContact($data);
        $getData = $this->contactManager->getDataForm($data);
        $tabData = [
            'listeMessage' => $message,
            'donnee' => $getData,
        ];
        $this->view->renderer('Frontend', 'contact', $tabData);
    }
    /************************************End Page Contact************************************************* */

}