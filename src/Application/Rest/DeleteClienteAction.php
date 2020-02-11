<?php

namespace App\Application\Rest;

use App\Domain\Service\DeleteCliente;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class DeleteClienteAction
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
        /** @var DeleteCliente $deleteCliente */
        $deleteCliente = $this->container->get(DeleteCliente::class);
        $deleteCliente->delete($args['id']);

        return $response
            ->withStatus(200)
            ->withJson([
                'status_code' => 200,
                'message' => 'Cliente removido com sucesso'
            ]);
    }
}
