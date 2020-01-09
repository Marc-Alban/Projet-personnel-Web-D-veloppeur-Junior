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
        $this->user = $this->userRepository;
    }

    /**
     * Retourne le nom de l'utilisateur
     *
     * @return string
     */
    public function getUsers(): string
    {
        return $this->user->readUser()->getName();
    }

    /**
     * Retourne le mot de passe
     *
     * @return string
     */
    public function getPass(): string
    {
        return $this->user->readUser()->getPassword();
    }

    /**
     * Verifie si le mail existe bien en bdd
     * retourne un boolean si c'est bon ou faux
     *
     * @return void
     */
    private function checkBddMail($mailPost): bool
    {
        $mail = $this->user->readUser()->getMail();
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
    private function message($token): void
    {
        $headers = "MIME-Version: 1.0\r\n..";
        $headers = 'From: From: BmFinance' . "\n";
        $headers .= 'Content-Type: text/html; charset="UTF-8"' . "\n";
        $headers .= 'Content-Transfer-Encoding: 8bit';

        $message = "
        <html>
            <head>
                <title> Renouvellement du mot de passe </title>
            </head>
            <body>
                <p>Bonjour,</p>

                <p>Vous avez cliqué sur le lien pour renouveler son mot de passe:</p>
                <p>Cliquer sur le lien dessous pour modifier votre mot de passe.</p>
                <p><a href='http://3bigbangbourse.fr/?p=newPassword&token=" . $token . "'>http://3bigbangbourse.fr/?p=newPassword&token=' . $token . '</a></p>
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
        $token = password_hash(random_bytes(5), PASSWORD_DEFAULT);
        $succes = $data["session"]["succes"] ?? null;
        unset($data["session"]["succes"]);
        $error = $data['session']['error'] ?? null;
        unset($data["session"]["error"]);

        if (isset($data['post']['submit']) && !empty($data['post']['submit'])) {

            $mail = $this->getMail($data);

            if (empty($mail) || !isset($mail)) {
                $error['empty'] = "Veuillez mettre un mail";
            } else if (!preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $mail)) {
                $error['mailWrong'] = "L'adresse e-mail est invalide";
            } else if ($this->checkBddMail($mail) === false) {
                $error['mailEmpty'] = "L'adresse e-mail est inconnue de nos service";
            }

            if (empty($error)) {
                if ($this->checkBddMail($mail) === true) {
                    $this->message($token);
                    $this->user->insertToken($token);
                    $this->user->changeActive('false');
                    $succes['message'] = 'Vous allez recevoir un mail de réinitialisation de mot de passe';
                }
                return $succes;
            }
            return $error;
        }

        return null;
    }

    public function getMail(array $data): ?string
    {
        $mail = htmlentities(strip_tags(trim($data['post']['mail']))) ?? null;
        return $mail;
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
        $tokenUrl = trim(htmlentities($data['get']['token'])) ?? null;
        $token = $this->user->readUser()->getToken();

        if ($tokenUrl === null || empty($tokenUrl) || $token !== $tokenUrl) {
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
                $this->userRepository->changePass($data);
                $this->userRepository->changeActive('true');
                $succes['message'] = 'Mot de passe changé';
                return $succes;
            }
            return $error;
        }
    }

}