<?php
declare (strict_types = 1);
namespace App\Model\Manager;

class ContactManager
{

/**
 * Envoie les données dans le formulaire de contact
 *
 * @return void
 */
    private function sendMail($data): void
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= 'From:' . $data['post']['name_lastname'] . "\n";
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
            <td>Code Postale</td>
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

        mail("millet.marcalban@gmail.com", "Page Contact - BmFinance.com", $message, $headers);

    }

/**
 * Vérifie le formulaire de contact
 *
 * @param [type] $data
 */
    public function verifMail(?array $data)
    {
        if (isset($data['post']['submit'])) {

            $sujet = htmlentities(strip_tags(trim($data['post']['sujet'])));
            $nomPrenom = htmlentities(strip_tags(trim($data['post']['name_lastname'])));
            $tel = trim($data['post']['telephone']);
            $mail = trim($data['post']['mail']);
            $cp = htmlentities(strip_tags(trim($data['post']['codepostal'])));
            $message = htmlentities(strip_tags(trim($data['post']['message'])));
            $liste = $data['post']['liste'];

            $errors = $data["session"]["error"] ?? null;
            unset($data["session"]["error"]);

            $succes = $data["session"]["succes"] ?? null;
            unset($data["session"]["succes"]);

            if (empty($sujet) && empty($tel) && empty($mail) && empty($message) && empty($nomPrenom) && empty($cp)) {
                return $errors['allEmpty'] = "Veuillez remplir le formulaire";
            } else if (empty($mail)) {
                return $errors['mailEmpty'] = "Veuillez mettre un mail";
            } else if (empty($sujet)) {
                return $errors['subject'] = "Veuillez mettre un sujet";
            } else if (empty($tel)) {
                return $errors['telEmpty'] = "Veuillez mettre un téléphone";
            } else if (empty($message)) {
                return $errors['message'] = "Veuillez mettre un message";
            } else if (empty($nomPrenom)) {
                return $errors['name'] = "Veuillez mettre un nom ou un prénom";
            } else if (empty($liste)) {
                return $errors['name'] = "Veuillez choisir une option";
            } else if (empty($cp)) {
                return $errors['name'] = "Veuillez mettre un code postal";
            }

            if (!preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $mail)) {
                return $errors['mailWrong'] = "L'adresse eMail est invalide";
            }

            if (!preg_match(" #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# ", $tel)) {
                return $errors['telWrong'] = "Le téléphone est invalide";
            }

            if (empty($errors)) {
                $this->sendMail($data);
                return $succes['message'] = 'Message envoyé';
            }

        }
    }

}