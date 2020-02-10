<?php

use Slim\Container;

/** @var Container */
$container = new Container();

require_once __DIR__ . '/../db/database.php';

return $container;
