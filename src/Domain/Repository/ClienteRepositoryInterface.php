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
     * @param int $id
     * @return Cliente
     */
    public function getOneById(int $id): Cliente;

    /**
     * @return array
     */
    public function findAll(): array;
}
