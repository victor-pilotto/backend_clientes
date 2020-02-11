<?php

namespace App\Domain\Service;

use App\Domain\Repository\ClienteRepositoryInterface;

class DeleteCliente
{
    private ClienteRepositoryInterface $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function delete(int $id): void
    {
        $cliente = $this->clienteRepository->getOneById($id);

        $this->clienteRepository->remove($cliente);
    }
}