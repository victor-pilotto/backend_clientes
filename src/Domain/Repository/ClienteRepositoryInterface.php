<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Cliente;

interface ClienteRepositoryInterface
{
    /**
     * @param Cliente $cliente
     */
    public function store(Cliente $cliente): void;

    /**
     * @param Cliente $cliente
     */
    public function remove(Cliente $cliente): void;

    /**
     * @param string $id
     * @return Cliente
     */
    public function getOneById(string $id): Cliente;
}
