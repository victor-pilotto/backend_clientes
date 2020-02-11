<?php

namespace App\Application\Rest;

use App\Application\DTO\ClienteDTO;
use App\Domain\Service\InsereCliente;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class InsereClienteAction
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

        $clienteDTO = ClienteDTO::fromArray($params);

        /** @ar $insereCliente InsereCliente */
        $insereCliente = $this->container->get(InsereCliente::class);
        $insereCliente->insere($clienteDTO);

        return $response
            ->withStatus(200)
            ->withJson([
                'status_code' => 200,
                'message' => 'Usuario adicionando com sucesso'
            ]);
    }
}
