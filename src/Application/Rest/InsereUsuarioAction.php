<?php

namespace App\Application\Rest;

use App\Application\DTO\InsereUsuarioDTO;
use App\Domain\Service\InsereUsuario;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class InsereUsuarioAction
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function __invoke(Request $request, Response $response): ResponseInterface
    {
        $params = (array)$request->getParams();

        $insereUsuarioDTO = InsereUsuarioDTO::fromArray($params);

        /** @var InsereUsuario $insereUsuario */
        $insereUsuario = $this->container->get(InsereUsuario::class);
        $insereUsuario->insere($insereUsuarioDTO);

        return $response
            ->withStatus(200)
            ->withJson([
                'status_code' => 200,
                'message' => 'Usuario adicionando com sucesso'
            ]);
    }
}
