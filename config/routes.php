<?php

use App\Application\Middleware;
use App\Application\Rest\AtualizaClienteAction;
use App\Application\Rest\BuscaClienteByIdAction;
use App\Application\Rest\BuscaClientesAction;
use App\Application\Rest\DeleteClienteAction;
use App\Application\Rest\InsereClienteAction;
use App\Application\Rest\InsereUsuarioAction;
use App\Application\Rest\LoginAction;
use Slim\Container;

/** @var Container $container */
$container = $app->getContainer();

$app->add(new Middleware\ErrorHandler());

$app->post('/login', new LoginAction($container));
$app->post('/usuario', new InsereUsuarioAction($container));
$app->post('/cliente', new InsereClienteAction($container));

$app->put('/cliente/{id}', new AtualizaClienteAction($container));

$app->delete('/cliente/{id}', new DeleteClienteAction($container));

$app->get('/cliente/{id}', new BuscaClienteByIdAction($container));
$app->get('/clientes', new BuscaClientesAction($container));

