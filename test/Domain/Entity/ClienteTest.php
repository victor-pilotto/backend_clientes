<?php

namespace Test\Domain\Entity;

use App\Application\DTO\ClienteDTO;
use App\Application\DTO\EnderecoDTO;
use App\Domain\Entity\Cliente;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ClienteTest extends TestCase
{
    private MockObject $clienteDTO;

    private MockObject $enderecoDTO;

    public function setUp(): void
    {
        $this->clienteDTO = $this->getMockBuilder(ClienteDTO::class)
            ->disableOriginalConstructor()->getMock();
        $this->enderecoDTO = $this->getMockBuilder(EnderecoDTO::class)
            ->disableOriginalConstructor()->getMock();
    }

    /** @test */
    public function fromClienteDTODeveFuncionar(): void
    {
        $params = [
            'nome' => 'Nome',
            'data_nascimento' => '1990-07-19',
            'cpf' => '12345678901',
            'rg' => '12123123',
            'telefone' => '19988880000'
        ];

        $paramsEndereco = [
            'cep' => '12345678',
            'logradouro' => 'Rua Teste',
            'numero' => random_int(0, 999),
            'bairro' => 'Teste de Bairro',
            'complemento' => 'Perto da Padaria',
            'municipio' => 'Americana',
            'estado' => 'São Paulo'
        ];

        $this->populateMockEndereco($paramsEndereco);
        $this->populateMockCliente($params);

        $cliente = Cliente::fromClienteDTO($this->clienteDTO);

        $this->assertEquals($params['nome'], $cliente->getNome());
        $this->assertEquals($params['data_nascimento'], $cliente->getDataNascimento()->format('Y-m-d'));
        $this->assertEquals($params['cpf'], $cliente->getCpf());
        $this->assertEquals($params['rg'], $cliente->getRg());
        $this->assertEquals($params['telefone'], $cliente->getTelefone());
        $this->assertCount(1, $cliente->getEnderecos());
    }

    /** @test */
    public function jsonSerializeDeveFuncionar(): void
    {
        $params = [
            'nome' => 'Nome',
            'data_nascimento' => '1990-07-19',
            'cpf' => '12345678901',
            'rg' => '12123123',
            'telefone' => '19988880000'
        ];

        $paramsEducacao = [
            'cep' => '12345678',
            'logradouro' => 'Rua Teste',
            'numero' => 777,
            'bairro' => 'Teste de Bairro',
            'complemento' => 'Perto da Padaria',
            'municipio' => 'Americana',
            'estado' => 'São Paulo'
        ];

        $this->populateMockEndereco($paramsEducacao);
        $this->populateMockCliente($params);

        $cliente = Cliente::fromClienteDTO($this->clienteDTO);
        $arrCliente = $cliente->jsonSerialize();

        $expectedParams = [
            'id' => null,
            'nome' => 'Nome',
            'dataNascimento' => '1990-07-19',
            'cpf' => '12345678901',
            'rg' => '12123123',
            'telefone' => '19988880000',
            'enderecos' => [
                [
                    'id' => null,
                    'cep' => '12345678',
                    'logradouro' => 'Rua Teste',
                    'numero' => 777,
                    'bairro' => 'Teste de Bairro',
                    'complemento' => 'Perto da Padaria',
                    'municipio' => 'Americana',
                    'estado' => 'São Paulo'
                ]
            ]
        ];

        $this->assertEquals($expectedParams, $arrCliente);
    }

    private function populateMockEndereco(array $params): void
    {
        $this->enderecoDTO
            ->expects($this->once())
            ->method('getCep')
            ->willReturn($params['cep']);
        $this->enderecoDTO
            ->expects($this->once())
            ->method('getLogradouro')
            ->willReturn($params['logradouro']);
        $this->enderecoDTO
            ->expects($this->once())
            ->method('getNumero')
            ->willReturn($params['numero']);
        $this->enderecoDTO
            ->expects($this->once())
            ->method('getBairro')
            ->willReturn($params['bairro']);
        $this->enderecoDTO
            ->expects($this->once())
            ->method('getComplemento')
            ->willReturn($params['complemento']);
        $this->enderecoDTO
            ->expects($this->once())
            ->method('getMunicipio')
            ->willReturn($params['municipio']);
        $this->enderecoDTO
            ->expects($this->once())
            ->method('getEstado')
            ->willReturn($params['estado']);
    }

    private function populateMockCliente(array $params): void
    {
        $this->clienteDTO
            ->expects($this->once())
            ->method('getNome')
            ->willReturn($params['nome']);
        $this->clienteDTO
            ->expects($this->once())
            ->method('getDataNascimento')
            ->willReturn($params['data_nascimento']);
        $this->clienteDTO
            ->expects($this->once())
            ->method('getCpf')
            ->willReturn($params['cpf']);
        $this->clienteDTO
            ->expects($this->once())
            ->method('getRg')
            ->willReturn($params['rg']);
        $this->clienteDTO
            ->expects($this->once())
            ->method('getTelefone')
            ->willReturn($params['telefone']);
        $this->clienteDTO
            ->expects($this->once())
            ->method('getEnderecos')
            ->willReturn([$this->enderecoDTO]);
    }
}
