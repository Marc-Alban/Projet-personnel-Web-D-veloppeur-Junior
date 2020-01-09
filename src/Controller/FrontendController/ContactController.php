<?php
declare (strict_types = 1);
namespace App\Controller\FrontendController;

use App\Model\Manager\ContactManager;
use App\View\View;

class ContactController
{

    private $view;
    private $manager;

    public function __construct()
    {
        $this->view = new View();
        $this->manager = new ContactManager();
    }

    /**
     * Rendu de la page contact
     *
     * @return void
     */
    public function ContactAction(?array $data): void
    {
        $message = $this->manager->verifMail($data);
        $getData = $this->manager->getData($data);
        $tabData = [
            'listeMessage' => $message,
            'donnee' => $getData,
        ];
        $this->view->renderer('Frontend', 'contact', $tabData);

    }

}