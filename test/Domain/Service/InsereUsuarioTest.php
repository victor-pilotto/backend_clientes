<?php

namespace Test\Domain\Service;

use App\Application\DTO\InsereUsuarioDTO;
use App\Domain\Repository\UsuarioRepositoryInterface;
use App\Domain\Service\InsereUsuario;
use PHPStan\Testing\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class InsereUsuarioTest extends TestCase
{
    private MockObject $usuarioRepository;

    private MockObject $insereUsuarioDTO;

    private InsereUsuario $insereUsuario;

    public function setUp(): void
    {
        $this->usuarioRepository = $this->getMockBuilder(UsuarioRepositoryInterface::class)
            ->getMockForAbstractClass();

        $this->insereUsuarioDTO = $this->getMockBuilder(InsereUsuarioDTO::class)
            ->disableOriginalConstructor()->getMock();

        $this->insereUsuario = new InsereUsuario($this->usuarioRepository);
    }

    /** @test */
    public function insereDeveFuncionar(): void
    {
        $this->usuarioRepository
            ->expects($this->once())
            ->method('store');

        $this->insereUsuario->insere($this->insereUsuarioDTO);
    }
}