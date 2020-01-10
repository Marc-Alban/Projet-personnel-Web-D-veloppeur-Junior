<?php
declare (strict_types = 1);
namespace App\Tools;

class Token
{

    private $token;
/**
 * Créer les tokens
 *
 * @return void
 */
    public function createSessionToken(): string
    {
        $this->token = bin2hex(random_bytes(32));
        return $this->token;
    }

    /**
     * Compare les tokens
     *
     * @param [type] $session
     * @param array $data
     * @return string|null
     */
    public function compareTokens(array $data): ?string
    {
        if (empty($data['session']['token']) || empty($data['post']['token'])) {
            return $errors['formOne'] = "Formulaire incorrect *";
        } else if ($data['session']['token'] !== $data['post']['token']) {
            return $errors['formTwo'] = "Formulaire incorrect **";
        }
    }
}