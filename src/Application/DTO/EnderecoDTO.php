<?php

namespace App\Application\DTO;

use Assert\Assertion;

class EnderecoDTO
{
    private string $cep;

    private string $logradouro;

    private int $numero;

    private string $bairro;

    private ? string $complemento;

    private string $municipio;

    private string $estado;

    private function __construct()
    {
    }

    /**
     * @return string
     */
    public function getCep() : string
    {
        return $this->cep;
    }

    /**
     * @return string
     */
    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    /**
     * @return int
     */
    public function getNumero(): int
    {
        return $this->numero;
    }

    /**
     * @return string
     */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    /**
     * @return string|null
     */
    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    /**
     * @return string
     */
    public function getMunicipio(): string
    {
        return $this->municipio;
    }

    /**
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * @param array $params
     * @return static
     */
    public static function fromArray(array $params): self
    {
        $instance = new self;

        Assertion::numeric($params['numero'], 'Numero precisa ser um valor numerico');
        Assertion::numeric($params['cep'], 'Cep precisa ser um valor numerico');

        $instance->cep = $params['cep'];
        $instance->logradouro = $params['logradouro'];
        $instance->numero = $params['numero'];
        $instance->bairro = $params['bairro'];
        $instance->complemento = $params['complemento'] ?? null;
        $instance->municipio = $params['municipio'];
        $instance->estado = $params['estado'];

        return $instance;
    }
}
