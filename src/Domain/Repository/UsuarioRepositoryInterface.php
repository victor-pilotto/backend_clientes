<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Usuario;

interface UsuarioRepositoryInterface
{
    /**
     * @param Usuario $usuario
     */
    public function store(Usuario $usuario): void;
}