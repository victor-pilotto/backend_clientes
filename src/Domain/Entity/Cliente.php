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
     *     type="integer"
     * )
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * @var \DateTime
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
     * @ORM\OneToMany(targetEntity="Endereco", mappedBy="cliente", cascade={"persist", "remove"})
     * @var Endereco[]|PersistentCollection|array
     */
    private $enderecos;

    /**
     * @return int
     */
    public function getId(): int
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
     * @return \DateTime
     */
    public function getDataNascimento(): \DateTime
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
     * @return Endereco[]
     */
    public function getEnderecos(): array
    {
        if ($this->enderecos instanceof PersistentCollection) {
            return $this->enderecos->toArray();
        }

        return (array)$this->enderecos;
    }

    public function jsonSerialize(): array
    {
        $props = get_object_vars($this);

        $props['dataNascimento'] = $this->getDataNascimento()->format('Y-m-d');
        $props['enderecos'] = array_map(static function (Endereco $endereco) {
            return $endereco->jsonSerialize();
        }, $this->getEnderecos());

        return $props;
    }

    public static function fromClienteDTO(ClienteDTO $clienteDTO): self
    {
        $instance = new self;

        $instance->nome = $clienteDTO->getNome();
        $instance->dataNascimento = new \DateTime($clienteDTO->getDataNascimento());
        $instance->cpf = $clienteDTO->getCpf();
        $instance->rg = $clienteDTO->getRg();
        $instance->telefone = $clienteDTO->getTelefone();


        foreach ($clienteDTO->getEnderecos() as $enderecoDTO) {
            $instance->enderecos[] = Endereco::fromEnderecoDTOAndCliente($enderecoDTO, $instance);
        }

        return $instance;
    }
}
