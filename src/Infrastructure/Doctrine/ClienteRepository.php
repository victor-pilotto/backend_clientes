<?php

namespace App\Infrastructure\Doctrine;

use App\Domain\Entity\Cliente;
use App\Domain\Repository\ClienteRepositoryInterface;
use Doctrine\ORM\EntityManager;
use App\Domain\Exception;

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

    /**
     * @param Cliente $cliente
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function remove(Cliente $cliente): void
    {
        $this->entityManager->remove($cliente);
        $this->entityManager->flush();
    }

    /**
     * @param int $id
     * @return Cliente
     */
    public function getOneById(int $id): Cliente
    {
        $result = $this->entityManager->getRepository(Cliente::class)->find($id);

        if ($result instanceof Cliente) {
            return $result;
        }

        throw Exception\ClienteNaoEncontrado::fromId($id);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->entityManager->getRepository(Cliente::class)->findAll();
    }
}
