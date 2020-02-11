<?php

namespace App\Domain\Service;

use App\Application\DTO\ClienteDTO;
use App\Domain\Entity\Cliente;
use App\Domain\Repository\ClienteRepositoryInterface;

class AtualizaCliente
{
    private ClienteRepositoryInterface $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function atualiza(int $id, ClienteDTO $clienteDTO): Cliente
    {
        $cliente = $this->clienteRepository->getOneById($id);

        $cliente->updateFromDTO($clienteDTO);

        $this->clienteRepository->store($cliente);

        return $cliente;
    }
}
