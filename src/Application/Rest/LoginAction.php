<?php

namespace App\Application\Rest;

use App\Domain\Repository\UsuarioRepositoryInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class LoginAction
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

       /** @var $usuarioRepository UsuarioRepositoryInterface */
        $usuarioRepository = $this->container->get(UsuarioRepositoryInterface::class);
        $usuarioRepository->getOneByLoginAndSenha($params['login'], $params['senha']);

        return $response
            ->withStatus(200)
            ->withJson([
                'status_code' => 200,
                'message' => 'Login realizado com sucesso'
            ]);
    }
}
