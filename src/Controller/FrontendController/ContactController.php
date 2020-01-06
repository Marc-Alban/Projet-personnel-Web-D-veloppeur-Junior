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
        $datas = $this->manager->verifMail($data);
        $this->view->renderer('Frontend', 'contact', ["donnees" => $datas]);
    }

}