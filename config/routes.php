<?php

use App\Application\Rest\DeleteUsuarioAction;
use App\Application\Rest\InsereUsuarioAction;
use App\Application\Rest\LoginAction;
use App\Application\Middleware;
use Slim\Container;
use App\Application\Rest\InsereClienteAction;

/** @var Container $container */
$container = $app->getContainer();

//$app->add(new Middleware\ErrorHandler());

$app->post('/login', new LoginAction($container));
$app->post('/usuario', new InsereUsuarioAction($container));
$app->post('/cliente', new InsereClienteAction($container));

//$app->put('/cliente/{id}', new InsereUsuarioAction($container));
//
$app->delete('/cliente/{id}', new DeleteUsuarioAction($container));
//
//$app->get('/cliente/{id}', new InsereUsuarioAction($container));
//$app->get('/cliente', new InsereUsuarioAction($container));

