<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Usuario;

interface UsuarioRepositoryInterface
{
    /**
     * @param Usuario $usuario
     */
    public function store(Usuario $usuario): void;

    /**
     * @param string $login
     * @param string $senha
     * @return Usuario
     */
    public function getOneByLoginAndSenha(string $login, string $senha): Usuario;
}
