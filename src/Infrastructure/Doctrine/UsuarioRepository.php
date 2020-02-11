<?php

namespace App\Infrastructure\Doctrine;

use App\Domain\Entity\Usuario;
use App\Domain\Exception;
use App\Domain\Repository\UsuarioRepositoryInterface;
use Doctrine\ORM\EntityManager;

class UsuarioRepository implements UsuarioRepositoryInterface
{

    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function store(Usuario $usuario): void
    {
        $this->entityManager->persist($usuario);
        $this->entityManager->flush();
    }

    /**
     * @param string $login
     * @param string $senha
     * @return Usuario
     */
    public function getOneByLoginAndSenha(string $login, string $senha): Usuario
    {
        $result = $this->entityManager->getRepository(Usuario::class)->findOneBy([
            'login' => $login,
            'senha' => $senha
        ]);

        if ($result instanceof Usuario) {
            return $result;
        }

        throw Exception\UsuarioNaoEncontrado::fromLogin($login);
    }
}
