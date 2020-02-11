<?php

namespace App\Domain\Service;

use App\Application\DTO\ClienteDTO;
use App\Domain\Entity\Cliente;
use App\Domain\Repository\ClienteRepositoryInterface;

class InsereCliente
{
    private ClienteRepositoryInterface $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function insere(ClienteDTO $clienteDTO): Cliente
    {
        $cliente = Cliente::fromClienteDTO($clienteDTO);

        $this->clienteRepository->store($cliente);

        return $cliente;
    }
}
