<?php
declare (strict_types = 1);
namespace App\Tools;

class Token
{
    private $token;

/************************************Create Token Session************************************************ */
/**
 * Créer les tokens
 *
 * @return void
 */
    public function createSessionToken(): string
    {
        $this->token = bin2hex(random_bytes(32));
        //$data['session']['token'] = $this->token; --> pas sur du tout ?
        //return $data['session']['token'];
        return $this->token;
    }
/************************************End Create Token Session************************************************ */
/************************************Compare Token Session************************************************ */
    /**
     * Compare les tokens
     *
     * @param [type] $session
     * @param array $getData
     * @return string|null
     */
    public function compareTokens(array $data): ?string
    {
        if (!isset($data['session']['token']) || !isset($data['post']['token']) || empty($data['session']['token']) || empty($data['post']['token']) || $data['session']['token'] !== $data['post']['token']) {
            return $errors['formToken'] = "Formulaire incorrect";
        }
        return null;
    }
/************************************End Compare Token Session************************************************ */
}