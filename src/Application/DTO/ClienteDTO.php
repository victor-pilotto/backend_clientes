<?php

namespace App\Application\DTO;

use Assert\Assertion;

class ClienteDTO
{
    private string $nome;

    private string $dataNascimento;

    private string $cpf;

    private string $rg;

    private string $telefone;

    /** @var EnderecoDTO[] */
    private array $enderecos;

    private function __construct()
    {
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @return string
     */
    public function getRg(): string
    {
        return $this->rg;
    }

    /**
     * @return string
     */
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    /**
     * @return EnderecoDTO[]
     */
    public function getEnderecos(): array
    {
        return $this->enderecos;
    }

    public static function fromArray(array $params): self
    {
        Assertion::notBlank($params['nome'], 'Nome não pode ser vazia');
        Assertion::notBlank($params['data_nascimento'], 'Data de nascimento não pode ser vazia');
        Assertion::notBlank($params['cpf'], 'CPF não pode ser vazia');
        Assertion::notBlank($params['rg'], 'RG não pode ser vazia');
        Assertion::notBlank($params['telefone'], 'Telefone não pode ser vazia');
        Assertion::date($params['data_nascimento'], 'Y-m-d', 'Data de nascimento deve estar no formato AAAA-MM-DD');

        $instance = new self;

        $instance->nome = $params['nome'];
        $instance->dataNascimento = $params['data_nascimento'];
        $instance->cpf = $params['cpf'];
        $instance->rg = $params['rg'];
        $instance->telefone = $params['telefone'];

        foreach ($params['enderecos'] as $endereco) {
            $instance->enderecos[] = EnderecoDTO::fromArray($endereco);
        }

        return $instance;
    }
}
