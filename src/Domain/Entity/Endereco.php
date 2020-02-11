<?php

namespace App\Domain\Entity;

use App\Application\DTO\EnderecoDTO;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="endereco")
 */
class Endereco
{
    /**
     * @ORM\Id
     * @ORM\Column(
     *     name="id",
     *     type="integer"
     * )
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(
     *     name="cep",
     *     type="string"
     * )
     */
    private string $cep;

    /**
     * @ORM\Column(
     *     name="logradouro",
     *     type="string"
     * )
     */
    private string $logradouro;

    /**
     * @ORM\Column(
     *     name="numero",
     *     type="integer"
     * )
     */
    private int $numero;

    /**
     * @ORM\Column(
     *     name="bairro",
     *     type="string"
     * )
     */
    private string $bairro;

    /**
     * @ORM\Column(
     *     name="complemento",
     *     type="string"
     * )
     */
    private ? string $complemento;

    /**
     * @ORM\Column(
     *     name="municipio",
     *     type="string"
     * )
     */
    private string $municipio;

    /**
     * @ORM\Column(
     *     name="estado",
     *     type="string"
     * )
     */
    private string $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="enderecos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private Cliente $cliente;

    private function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCep(): string
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
     * @return null|string
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
     * @return Cliente
     */
    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function jsonSerialize(): array
    {
        $props = get_object_vars($this);

        unset($props['cliente']);

        return $props;
    }

    public static function fromEnderecoDTOAndCliente(EnderecoDTO $enderecoDTO, Cliente $cliente): self
    {
        $instance = new self;

        $instance->cep = $enderecoDTO->getCep();
        $instance->logradouro = $enderecoDTO->getLogradouro();
        $instance->numero = $enderecoDTO->getNumero();
        $instance->bairro = $enderecoDTO->getBairro();
        $instance->complemento = $enderecoDTO->getComplemento();
        $instance->municipio = $enderecoDTO->getMunicipio();
        $instance->estado = $enderecoDTO->getEstado();
        $instance->cliente = $cliente;

        return $instance;
    }
}
