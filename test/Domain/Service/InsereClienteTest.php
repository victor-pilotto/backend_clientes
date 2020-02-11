<?php

namespace Test\Domain\Service;

use App\Application\DTO\ClienteDTO;
use App\Domain\Repository\ClienteRepositoryInterface;
use App\Domain\Service\InsereCliente;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class InsereClienteTest extends TestCase
{
    private MockObject $clienteDTO;

    private MockObject $clienteRepository;

    private InsereCliente $insereCliente;

    public function setUp(): void
    {
        $this->clienteRepository = $this->getMockBuilder(ClienteRepositoryInterface::class)
            ->getMockForAbstractClass();

        $this->clienteDTO = $this->getMockBuilder(ClienteDTO::class)
            ->disableOriginalConstructor()->getMock();

        $this->insereCliente = new InsereCliente($this->clienteRepository);
    }
    /** @test */
    public function insereDeveFuncionar(): void
    {
        $this->clienteRepository
            ->expects($this->once())
            ->method('store');

        $this->insereCliente->insere($this->clienteDTO);
    }
}
