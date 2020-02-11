<?php

namespace Test\Domain\Service;

use App\Application\DTO\ClienteDTO;
use App\Domain\Repository\ClienteRepositoryInterface;
use App\Domain\Service\AtualizaCliente;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class AtualizaClienteTest extends TestCase
{
    private MockObject $clienteDTO;

    private MockObject $clienteRepository;

    private AtualizaCliente $atualizaCliente;

    public function setUp(): void
    {
        $this->clienteRepository = $this->getMockBuilder(ClienteRepositoryInterface::class)
            ->getMockForAbstractClass();

        $this->clienteDTO = $this->getMockBuilder(ClienteDTO::class)
            ->disableOriginalConstructor()->getMock();

        $this->atualizaCliente = new AtualizaCliente($this->clienteRepository);
    }
    /** @test */
    public function atualizaDeveFuncionar(): void
    {
        $this->clienteRepository
            ->expects($this->once())
            ->method('store');

        $this->atualizaCliente->atualiza(random_int(0, 999), $this->clienteDTO);
    }
}
