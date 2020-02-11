<?php

use App\Domain\Repository\ClienteRepositoryInterface;
use App\Domain\Repository\UsuarioRepositoryInterface;
use App\Domain\Service\InsereCliente;
use App\Domain\Service\InsereUsuario;
use App\Infrastructure\Doctrine\ClienteRepository;
use App\Infrastructure\Doctrine\UsuarioRepository;
use Slim\Container;

/** @var Container */
$container = new Container();

require_once __DIR__ . '/../db/database.php';

$container[InsereUsuario::class] = static function (Container $container) {
    return new InsereUsuario($container->get(UsuarioRepositoryInterface::class));
};
$container[InsereCliente::class] = static function (Container $container) {
    return new InsereCliente($container->get(ClienteRepositoryInterface::class));
};

// Repository
$container[UsuarioRepositoryInterface::class] = static function (Container $container) {
    return new UsuarioRepository($container->get('doctrine'));
};
$container[ClienteRepositoryInterface::class] = static function (Container $container) {
    return new ClienteRepository($container->get('doctrine'));
};

return $container;
