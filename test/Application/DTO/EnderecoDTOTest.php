<?php

namespace Test\Application\DTO;

use App\Application\DTO\EnderecoDTO;
use PHPUnit\Framework\TestCase;

class EnderecoDTOTest extends TestCase
{
    /** @test */
    public function fromArrayDeveFuncionar(): void
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

        $enderecoDTO = EnderecoDTO::fromArray($params);

        $this->assertEquals($params['cep'], $enderecoDTO->getCep());
        $this->assertEquals($params['logradouro'], $enderecoDTO->getLogradouro());
        $this->assertEquals($params['numero'], $enderecoDTO->getNumero());
        $this->assertEquals($params['bairro'], $enderecoDTO->getBairro());
        $this->assertEquals($params['complemento'], $enderecoDTO->getComplemento());
        $this->assertEquals($params['municipio'], $enderecoDTO->getMunicipio());
        $this->assertEquals($params['estado'], $enderecoDTO->getEstado());
    }
}
