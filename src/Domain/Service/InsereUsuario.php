<?php

namespace App\Domain\Service;

use App\Application\DTO\InsereUsuarioDTO;
use App\Domain\Entity\Usuario;
use App\Domain\Repository\UsuarioRepositoryInterface;

class InsereUsuario
{
    private UsuarioRepositoryInterface $usuarioRepository;

    public function __construct(UsuarioRepositoryInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function insere(InsereUsuarioDTO $insereUsuarioDTO): Usuario
    {
        $usuario = Usuario::fromInsereUsuarioDTO($insereUsuarioDTO);

        $this->usuarioRepository->store($usuario);

        return $usuario;
    }
}
