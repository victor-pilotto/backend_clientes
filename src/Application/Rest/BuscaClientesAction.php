<?php

namespace App\Application\Rest;

use App\Application\Presenter\ArrayKeys;
use App\Domain\Entity\Cliente;
use App\Domain\Repository\ClienteRepositoryInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class BuscaClientesAction
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
        $arrCliente = $clienteRepository->findAll();

        return $response
            ->withStatus(200)
            ->withJson([
                'status_code' => 200,
                'data' => array_map(static function (Cliente $cliente) {
                    return ArrayKeys::toSnakeCase($cliente->jsonSerialize());
                }, $arrCliente),
                'message' => 'Clientes localizado com sucesso'
            ]);
    }
}
