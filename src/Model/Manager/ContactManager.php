<?php
declare (strict_types = 1);
namespace App\Model\Manager;

class ContactManager
{

    /************************************Contenu Mail Contact************************************************* */
/**
 * Envoie les données dans le formulaire de contact
 *
 * @return void
 */
    private function sendMail($data): void
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= 'From:' . $data['post']['nameLastname'] . "\n";
        $headers .= 'Content-Type:text/html; charset="UTF-8"' . "\n";
        $headers .= 'Content-Transfer-Encoding: 8bit';

        $message = '
<html>

<head>
    <title>' . $data['post']['sujet'] . '</title>
</head>

<body>
    <table>
        <tr>
            <th>Legende</th>
            <th>Contenu</th>
        </tr>
        <tr>
            <td>Téléphone</td>
            <td>' . $data['post']['telephone'] . '</td>
        </tr>
        <tr>
            <td>Mail</td>
            <td>' . $data['post']['mail'] . '</td>
        </tr>
        <tr>
            <td>Code Postal</td>
            <td>' . $data['post']['codepostal'] . '</td>
        </tr>
        <tr>
            <td>Liste</td>
            <td>' . $data['post']['liste'] . '</td>
        </tr>
        <tr>
            <td>Message</td>
            <td>' . $data['post']['sujet'] . '</td>
        </tr>
        <tr>
            <td>Message</td>
            <td>' . $data['post']['message'] . '</td>
        </tr>
    </table>
</body>

</html>
';

        mail("marcalban@live.fr", "Page Contact - BmFinance.com", $message, $headers);
    }
    /************************************End Contenu Mail Contact************************************************* */

/************************************Verif Form Contact************************************************* */
/**
 * Vérifie le formulaire de contact
 *
 * @param [type] $data
 */
    public function verifFormContact(array $data): ?array
    {
        if (isset($data['post']['submit'])) {

            $tab = $this->getDataForm($data);
            $sujet = $tab['sujet'];
            $tel = $tab['tel'];
            $mail = $tab['mail'];
            $message = $tab['message'];
            $nomPrenom = $tab['namelastname'];
            $cp = $tab['cp'];

            $liste = $data['post']['liste'];

            $errors = $data["session"]["error"] ?? null;
            unset($data["session"]["error"]);

            $succes = $data["session"]["succes"] ?? null;
            unset($data["session"]["succes"]);

            if (empty($sujet) && empty($tel) && empty($mail) && empty($message) && empty($nomPrenom) && empty($cp)) {
                $errors['tab']['allEmpty'] = "Veuillez remplir le formulaire";
            } else if (empty($nomPrenom)) {
                $errors['tab']['name'] = "Veuillez mettre un nom ou un prénom";
            } else if (empty($mail)) {
                $errors['tab']['mailEmpty'] = "Veuillez mettre un mail";
            } else if (empty($tel)) {
                $errors['tab']['telEmpty'] = "Veuillez mettre un téléphone";
            } else if (empty($cp)) {
                $errors['tab']['cp'] = "Veuillez mettre un code postal";
            } else if (empty($sujet)) {
                $errors['tab']['subject'] = "Veuillez mettre un sujet";
            } else if (empty($message)) {
                $errors['tab']['message'] = "Veuillez mettre un message";
            } else if (empty($liste)) {
                $errors['tab']['liste'] = "Veuillez choisir une option";
            }

            if (!empty($mail)) {
                if (!preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $mail)) {
                    $errors['tab']['mailWrong'] = "L'adresse e-mail est invalide";
                }
            }

            if (!empty($tel)) {
                if (!preg_match(" #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# ", $tel)) {
                    $errors['tab']['telWrong'] = "Le téléphone est invalide";
                }
            }

            if (!empty($cp)) {
                if (!preg_match('#^[0-9]{5}$#', $cp)) {
                    $errors['tab']['cpWrong'] = "Le Code postal est invalide";
                }
            }

            if (empty($errors)) {
                $this->sendMail($data);
                $succes['send'] = 'Message envoyé';

                return $succes;
            }

            return $errors;
        }
        return null;
    }
    /************************************End Verif Form Contact************************************************* */

    /************************************Data Form Contact************************************************* */
    /**
     * Récupération des données du formulaire
     *
     * @param array $data
     * @return array
     */
    public function getDataForm(array $data): array
    {
        $tabData = [];
        if (isset($data['post']['submit'])) {
            $sujet = htmlentities(strip_tags(trim($data['post']['sujet'])));
            $nomPrenom = htmlentities(strip_tags(trim($data['post']['nameLastname'])));
            $tel = trim($data['post']['telephone']);
            $mail = trim($data['post']['mail']);
            $cp = htmlentities(strip_tags(trim($data['post']['codepostal'])));
            $message = htmlentities(strip_tags(trim($data['post']['message'])));
            $tabData = [
                'sujet' => $sujet,
                'namelastname' => $nomPrenom,
                'tel' => $tel,
                'mail' => $mail,
                'cp' => $cp,
                'message' => $message,
            ];
        }
        return $tabData;
    }
    /************************************End Data Form Contact************************************************* */

}