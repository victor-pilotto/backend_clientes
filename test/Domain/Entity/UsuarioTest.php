<?php

namespace Test\Domain\Entity;

use App\Application\DTO\InsereUsuarioDTO;
use App\Domain\Entity\Usuario;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase
{
    private MockObject $insereUsuarioDTO;

    public function setUp(): void
    {
        $this->insereUsuarioDTO = $this->getMockBuilder(InsereUsuarioDTO::class)
            ->disableOriginalConstructor()->getMock();
    }

    /** @test */
    public function fromInsereUsuarioDTODeveFuncionar(): void
    {
        $params = [
            'login' => 'Login',
            'senha' => 'Senha'
        ];

        $this->insereUsuarioDTO
            ->expects($this->once())
            ->method('getLogin')
            ->willReturn($params['login']);
        $this->insereUsuarioDTO
            ->expects($this->once())
            ->method('getSenha')
            ->willReturn($params['senha']);

        $usuario = Usuario::fromInsereUsuarioDTO($this->insereUsuarioDTO);

        $this->assertEquals($params['login'], $usuario->getLogin());
        $this->assertEquals($params['senha'], $usuario->getSenha());
    }
}