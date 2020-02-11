<?php

namespace App\Application\Rest;

use App\Application\DTO\ClienteDTO;
use App\Domain\Service\AtualizaCliente;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class AtualizaClienteAction
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
        $params = (array)$request->getParams();

        $clienteDTO = ClienteDTO::fromArray($params['data']);

        /** @var AtualizaCliente $insereCliente */
        $insereCliente = $this->container->get(AtualizaCliente::class);
        $insereCliente->atualiza($args['id'], $clienteDTO);

        return $response
            ->withStatus(200)
            ->withJson([
                'status_code' => 200,
                'message' => 'Cliente atualizados com sucesso'
            ]);
    }
}
