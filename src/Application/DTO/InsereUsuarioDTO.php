<?php

namespace App\Application\DTO;

use Assert\Assertion;

class InsereUsuarioDTO
{
    private string $login;

    private string $senha;

    private function __construct()
    {
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    public static function fromArray(array $params): self
    {
        Assertion::notBlank($params['login'], 'Login precisa ser informado');
        Assertion::notBlank($params['senha'], 'Senha precisa ser informado');

        $instance = new self;

        $instance->login = $params['login'];
        $instance->senha = $params['senha'];

        return $instance;
    }
}
