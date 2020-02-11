<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Cliente;

interface ClienteRepositoryInterface
{
    /**
     * @param Cliente $cliente
     */
    public function store(Cliente $cliente): void;
}