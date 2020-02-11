<?php

namespace App\Domain\Exception;

class UsuarioNaoEncontrado extends \DomainException
{
    /**
     * @param string $login
     * @return static
     */
    public static function fromLogin(string $login): self
    {
        return new self(sprintf('Usuario com o login "%s" não encontrado', $login));
    }
}
