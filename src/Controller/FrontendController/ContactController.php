<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\ContactManager;
use App\View\View;

class ContactController
{

    private $view;
    private $contactManager;

    public function __construct()
    {
        $this->view = new View();
        $this->contactManager = new ContactManager();
    }

    /************************************Page Contact************************************************* */

    /**
     * Rendu de la page contact
     *
     * @return void
     */
    public function ContactAction(?array $data): void
    {
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