<?php

namespace App\Domain\Exception;

class ClienteNaoEncontrado extends \DomainException
{
    /**
     * @param string $id
     * @return static
     */
    public static function fromId(string $id): self
    {
        return new self(sprintf('Cliente com o id "%s" não encontrado', $id));
    }
}