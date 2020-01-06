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
                $errors['allEmpty'] = "Veuillez remplir le formulaire";
            } else if (empty($nomPrenom)) {
                $errors['name'] = "Veuillez mettre un nom ou un prénom";
            } else if (empty($mail)) {
                $errors['mailEmpty'] = "Veuillez mettre un mail";
            } else if (empty($tel)) {
                $errors['telEmpty'] = "Veuillez mettre un téléphone";
            } else if (empty($cp)) {
                $errors['cp'] = "Veuillez mettre un code postal";
            } else if (empty($sujet)) {
                $errors['subject'] = "Veuillez mettre un sujet";
            } else if (empty($message)) {
                $errors['message'] = "Veuillez mettre un message";
            } else if (empty($liste)) {
                $errors['liste'] = "Veuillez choisir une option";
            }

            if (!empty($mail)) {
                if (!preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $mail)) {
                    $errors['mailWrong'] = "L'adresse e-mail est invalide";
                }
            }

            if (!empty($tel)) {
                if (!preg_match(" #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# ", $tel)) {
                    $errors['telWrong'] = "Le téléphone est invalide";
                }
            }

            if (!empty($cp)) {
                if (!preg_match('#^[0-9]{5}$#', $cp)) {
                    $errors['cpWrong'] = "Le Code postale est invalide";
                }
            }

            if (empty($errors)) {
                $this->sendMail($data);
                return $succes['message'] = 'Message envoyé';
            }

            return $errors;

        }
    }

}