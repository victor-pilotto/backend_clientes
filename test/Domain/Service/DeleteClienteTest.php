<?php

namespace Test\Domain\Service;

use App\Domain\Entity\Cliente;
use App\Domain\Repository\ClienteRepositoryInterface;
use App\Domain\Service\DeleteCliente;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DeleteClienteTest extends TestCase
{
    private MockObject $clienteRepository;

    private MockObject $cliente;

    private DeleteCliente $deleteCliente;

    public function setUp(): void
    {
        $this->clienteRepository = $this->getMockBuilder(ClienteRepositoryInterface::class)
            ->getMockForAbstractClass();

        $this->cliente = $this->getMockBuilder(Cliente::class)
            ->disableOriginalConstructor()->getMock();

        $this->deleteCliente = new DeleteCliente($this->clienteRepository);
    }

    /** @test */
    public function deleteDeveFuncionar(): void
    {
        $id = random_int(0, 999);

        $this->clienteRepository
            ->expects($this->once())
            ->method('getOneById')
            ->willReturn($this->cliente);

        $this->clienteRepository
            ->expects($this->once())
            ->method('remove');

        $this->deleteCliente->delete($id);
    }
}
