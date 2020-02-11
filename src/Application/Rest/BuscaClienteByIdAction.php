<?php

namespace App\Application\Rest;

use App\Application\Presenter\ArrayKeys;
use App\Domain\Repository\ClienteRepositoryInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class BuscaClienteByIdAction
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(Request $request, Response $response, array $args): ResponseInterface
    {
        /** @var ClienteRepositoryInterface $clienteRepository */
        $clienteRepository = $this->container->get(ClienteRepositoryInterface::class);
        $cliente = $clienteRepository->getOneById($args['id']);

        return $response
            ->withStatus(200)
            ->withJson([
                'status_code' => 200,
                'data' => ArrayKeys::toSnakeCase($cliente->jsonSerialize()),
                'message' => 'Cliente localizado com sucesso'
            ]);
    }
}
