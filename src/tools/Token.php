<?php
declare (strict_types = 1);
namespace App\Tools;

class Token
{
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
        if (!isset($this->token) || !isset($data['post']['token']) || empty($this->token['token']) || empty($data['post']['token']) || $this->token['token'] !== $data['post']['token']) {
            return "Formulaire incorrect";
        }
        return null;
    }
}