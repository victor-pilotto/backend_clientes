<?php

namespace App\Domain\Entity;

use App\Application\DTO\InsereUsuarioDTO;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuarios")
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\Column(
     *     name="id",
     *     type="integer"
     * )
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(
     *     name="login",
     *     type="string"
     * )
     */
    private string $login;

    /**
     * @ORM\Column(
     *     name="senha",
     *     type="string"
     * )
     */
    private string $senha;

    private function __construct()
    {
    }

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
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    public static function fromInsereUsuarioDTO(InsereUsuarioDTO $insereUsuarioDTO): self
    {
        $instance = new self;

        $instance->login = $insereUsuarioDTO->getLogin();
        $instance->senha = $insereUsuarioDTO->getSenha();

        return $instance;
    }
}
