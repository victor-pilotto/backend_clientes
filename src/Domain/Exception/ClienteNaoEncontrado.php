<?php

namespace App\Domain\Exception;

class ClienteNaoEncontrado extends \DomainException
{
    /**
     * @param int $id
     * @return static
     */
    public static function fromId(int $id): self
    {
        return new self(sprintf('Cliente com o id "%s" não encontrado', $id));
    }
}
