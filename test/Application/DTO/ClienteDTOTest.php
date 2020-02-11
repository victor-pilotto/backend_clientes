<?php

namespace Test\Application\DTO;

use App\Application\DTO\ClienteDTO;
use PHPUnit\Framework\TestCase;

class ClienteDTOTest extends TestCase
{
    /** @test */
    public function fromArrayDeveFuncionar(): void
    {
        $params = [
            'nome' => 'Nome',
            'data_nascimento' => '1990-07-19',
            'cpf' => '12345678901',
            'rg' => '12123123',
            'telefone' => '19988880000',
            'enderecos' => [
                [
                    'cep' => '12345678',
                    'logradouro' => 'Rua Teste',
                    'numero' => random_int(0, 999),
                    'bairro' => 'Teste de Bairro',
                    'complemento' => 'Perto da Padaria',
                    'municipio' => 'Americana',
                    'estado' => 'São Paulo'
                ],
                [
                    'cep' => '12345678',
                    'logradouro' => 'Rua Teste',
                    'numero' => random_int(0, 999),
                    'bairro' => 'Teste de Bairro',
                    'complemento' => 'Perto da Padaria',
                    'municipio' => 'Americana',
                    'estado' => 'São Paulo'
                ]
            ]
        ];

        $clienteDTO = ClienteDTO::fromArray($params);

        $this->assertEquals($params['nome'], $clienteDTO->getNome());
        $this->assertEquals($params['data_nascimento'], $clienteDTO->getDataNascimento());
        $this->assertEquals($params['cpf'], $clienteDTO->getCpf());
        $this->assertEquals($params['rg'], $clienteDTO->getRg());
        $this->assertEquals($params['telefone'], $clienteDTO->getTelefone());
        $this->assertCount(2, $clienteDTO->getEnderecos());
    }
}