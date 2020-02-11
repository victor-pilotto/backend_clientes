<?php

namespace App\Infrastructure\Doctrine;

use App\Domain\Entity\Cliente;
use App\Domain\Repository\ClienteRepositoryInterface;
use Doctrine\ORM\EntityManager;

class ClienteRepository implements ClienteRepositoryInterface
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function store(Cliente $cliente): void
    {
        $this->entityManager->persist($cliente);
        $this->entityManager->flush();
    }
}