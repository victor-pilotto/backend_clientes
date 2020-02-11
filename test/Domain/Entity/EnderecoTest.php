<?php

namespace Test\Domain\Entity;

use App\Application\DTO\EnderecoDTO;
use App\Domain\Entity\Cliente;
use App\Domain\Entity\Endereco;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EnderecoTest extends TestCase
{
    private MockObject $enderecoDTO;

    private MockObject $cliente;

    public function setUp(): void
    {
        $this->enderecoDTO = $this->getMockBuilder(EnderecoDTO::class)
            ->disableOriginalConstructor()->getMock();
        $this->cliente = $this->getMockBuilder(Cliente::class)
            ->disableOriginalConstructor()->getMock();
    }

    /** @test */
    public function fromEnderecoDTODeveFuncionar(): void
    {
        $params = [
            'cep' => '12345678',
            'logradouro' => 'Rua Teste',
            'numero' => random_int(0, 999),
            'bairro' => 'Teste de Bairro',
            'complemento' => 'Perto da Padaria',
            'municipio' => 'Americana',
            'estado' => 'São Paulo'
        ];

        $this->populateMockEndereco($params);

        $endereco = Endereco::fromEnderecoDTOAndCliente($this->enderecoDTO, $this->cliente);

        $this->assertEquals($params['cep'], $endereco->getCep());
        $this->assertEquals($params['logradouro'], $endereco->getLogradouro());
        $this->assertEquals($params['numero'], $endereco->getNumero());
        $this->assertEquals($params['bairro'], $endereco->getBairro());
        $this->assertEquals($params['complemento'], $endereco->getComplemento());
        $this->assertEquals($params['municipio'], $endereco->getMunicipio());
        $this->assertEquals($params['estado'], $endereco->getEstado());
        $this->assertEquals($this->cliente, $endereco->getCliente());
    }

    /** @test */
    public function jsonSerializeDeveFuncionar(): void
    {
        $expectedParams = [
            'id' => null,
            'cep' => '12345678',
            'logradouro' => 'Rua Teste',
            'numero' => random_int(0, 999),
            'bairro' => 'Teste de Bairro',
            'complemento' => 'Perto da Padaria',
            'municipio' => 'Americana',
            'estado' => 'São Paulo'
        ];

        $this->populateMockEndereco($expectedParams);

        $endereco = Endereco::fromEnderecoDTOAndCliente($this->enderecoDTO, $this->cliente);
        $arrEndereco = $endereco->jsonSerialize();

        $this->assertEquals($expectedParams, $arrEndereco);
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
}
