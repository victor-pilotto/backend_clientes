<?php

namespace Test\Application\DTO;

use App\Application\DTO\InsereUsuarioDTO;
use PHPUnit\Framework\TestCase;

class InsereUsuarioDTOTest extends TestCase
{
    /** @test */
    public function fromArrayDeveFuncionar(): void
    {
        $params = [
            'login' => 'Login',
            'senha' => 'Senha'
        ];

        $insereCadastroDTO = InsereUsuarioDTO::fromArray($params);

        $this->assertEquals($params['login'], $insereCadastroDTO->getLogin());
        $this->assertEquals($params['senha'], $insereCadastroDTO->getSenha());
    }
}
