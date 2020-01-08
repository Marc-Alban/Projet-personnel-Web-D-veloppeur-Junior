<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\UserRepository;

class UserManager
{

    private $userRepository;
    private $user;

    /**
     * Fonction constructeur, instanciation du userRepository
     * dans la propriété userRepository
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->user = $this->userRepository->readUser();
    }

    /**
     * Retourne le nom de l'utilisateur
     *
     * @return string
     */
    public function getUsers(): string
    {
        return $this->user->getName();
    }

    /**
     * Retourne le mot de passe
     *
     * @return string
     */
    public function getPass(): string
    {
        return $this->user->getPassword();
    }

    /**
     * Verifie si le mail existe bien en bdd
     * retourne un boolean si c'est bon ou faux
     *
     * @return void
     */
    private function checkBddMail($mailPost): bool
    {
        $mail = $this->user->getMail();
        if ($mail !== $mailPost) {
            return false;
        }

        return true;

    }
    /**
     * Message du mail que va recevoir l'utilisateur lors
     * de la réinitialisation de son mot de passe.
     *
     * @return void
     */
    private function message($mdp): void
    {
        $headers = "MIME-Version: 1.0\r\n..";
        $headers .= 'From: BmFinance';
        $headers .= "Content-type: text/html; charset= utf8\n..";
        $headers .= 'Content-Transfer-Encoding: 8bit';

        $message = "
        <html>
            <head>
                <title> Renouvellement du mot de passe </title>
            </head>
            <body>
                Bonjour,

                Vous avez cliqué sur le lien pour renouveler son mot de passe:
                Cliquer sur le lien dessous pour modifier votre mot de passe.
                <a href='http://3bigbangbourse.fr/?p=newPassword&token=' . $mdp . '>
            </body>
        </html>
        ";

        mail("millet.marcalban@gmail.com", "Page LostPassword - BmFinance.com", $message, $headers);

    }

    /**
     * Verifie le champ mail et affiche les erreurs
     *
     * @param array $data
     * @return array|null
     */
    public function verifMail(array $data): ?array
    {

        $mail = $data['post']['mail'] ?? null;
        $mdp = $this->user->getPassword();
        $succes = $data["session"]["succes"] ?? null;
        unset($data["session"]["succes"]);
        $error = $data['session']['error'] ?? null;
        unset($data["session"]["error"]);

        if (isset($data['post']['submit']) && !empty($data['post']['submit'])) {

            if (empty($mail) || !isset($mail)) {
                $error['empty'] = "Veuillez mettre un mail";
            } else if (!preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $mail)) {
                $error['mailWrong'] = "L'adresse e-mail est invalide";
            } else if ($this->checkBddMail($mail) === false) {
                $error['mailEmpty'] = "L'adresse e-mail est inconnue de nos service";
            }

            if (empty($error)) {
                if ($this->checkBddMail($mail) === true) {
                    $this->message($mdp);
                    $succes['message'] = 'Vous allez recevoir un mail de réinitialisation de mot de passe';

                }
                return $succes;
            }
            return $error;
        }

        return null;
    }

    /**
     * Verification du bon utilisateur pour acceder à la page
     * newPassword, si null renvoie sur la page lostPassword,
     * si ok retourne true
     *
     * @return null|bool
     */
    public function verifUser(array $data): ?bool
    {
        $mdpUrl = trim(htmlentities($data['get']['token'])) ?? null;
        $mdp = $this->user->getPassword();

        if ($mdpUrl === null || empty($mdpUrl) || $mdp !== $mdpUrl) {
            return null;
        }

        return true;
    }

    public function changeMdp(array $data)
    {
        $submit = $data['post']['submit'] ?? null;
        if ($submit) {
            $newMdp = trim(htmlentities($data['post']['newMdp'])) ?? null;
            $newMdpConf = trim(htmlentities($data['post']['newMdpConf'])) ?? null;
            $error = $data['session']['error'] ?? null;
            unset($data["session"]["error"]);

            if ($newMdp === null || empty($newMdp)) {
                $error['newMdpEmpty'] = "Veuillez mettre un mot de passe";
            } else if ($newMdpConf === null || empty($newMdpConf)) {
                $error['newMdpConfEmpty'] = "Veuillez mettre un mot de passe de confirmation";
            } else if (strlen($newMdp) < 6 || strlen($newMdpConf) < 6) {
                $error['mdpLen'] = "Veuillez mettre un mot de passe de plus de 6 caractères";
            } else if ($newMdp !== $newMdpConf) {
                $error['mdpError'] = "Mot de passe pas identique";
            } else if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $newMdp)) {
                $error['mdpWrong'] = 'Mot de passe non conforme, doit avoir minuscule-majuscule-chiffres-caractères';
            }
            if (empty($error)) {
                $this->userRepository->changeMdp($data);
                $succes['message'] = 'Mot de passe changé';
                return $succes;
            }
            return $error;
        }
    }

}