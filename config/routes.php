<?php

use App\Application\Rest\InsereUsuarioAction;
use Slim\Container;

/** @var Container $container */
$container = $app->getContainer();

$app->post('/usuario', new InsereUsuarioAction($container));
