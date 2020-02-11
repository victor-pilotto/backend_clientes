<?php

namespace App\Domain\Entity;

use App\Application\DTO\ClienteDTO;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="clientes")
 */
class Cliente
{
    /**
     * @ORM\Id
     * @ORM\Column(
     *     name="id",
     *     type="string"
     * )
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private string $id;

    /**
     * @ORM\Column(
     *     name="nome",
     *     type="string"
     * )
     */
    private string $nome;

    /**
     * @ORM\Column(
     *     name="data_nascimento",
     *     type="datetime"
     * )
     * @var \DateTimeImmutable
     */
    private $dataNascimento;

    /**
     * @ORM\Column(
     *     name="cpf",
     *     type="string"
     * )
     */
    private string $cpf;

    /**
     * @ORM\Column(
     *     name="rg",
     *     type="string"
     * )
     */
    private string $rg;

    /**
     * @ORM\Column(
     *     name="telefone",
     *     type="string"
     * )
     */
    private string $telefone;

    /**
     * @ORM\OneToMany(targetEntity="Endereco", mappedBy="cliente_id", cascade={"persist", "remove"})
     * @var PersistentCollection|array|Endereco[]
     */
    private $enderecos;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDataNascimento(): \DateTimeImmutable
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
     * @return Endereco[]|array|PersistentCollection
     */
    public function getEnderecos()
    {
        if ($this->enderecos instanceof PersistentCollection) {
            return $this->enderecos->toArray();
        }

        return $this->enderecos;
    }

    public static function fromClienteDTO(ClienteDTO $clienteDTO): self
    {
        $instance = new self;

        $instance->nome = $clienteDTO->getNome();
        $instance->dataNascimento = new \DateTimeImmutable($clienteDTO->getDataNascimento());
        $instance->cpf = $clienteDTO->getCpf();
        $instance->rg = $clienteDTO->getRg();
        $instance->telefone = $clienteDTO->getTelefone();


        foreach ($clienteDTO->getEnderecos() as $enderecoDTO) {
            $instance->enderecos[] = Endereco::fromEnderecoDTOAndCliente($enderecoDTO, $instance);
        }

        return $instance;
    }
}