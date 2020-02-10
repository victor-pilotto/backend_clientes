<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$container['doctrine'] = static function () {
    $paths = [__DIR__ . '/../../src'];
    $isDevMode = true;
    $proxyDir = null;
    $cache = null;
    $useSimpleAnnotationReader = false;

    $config = Setup::createAnnotationMetadataConfiguration(
        $paths,
        $isDevMode,
        $proxyDir,
        $cache,
        $useSimpleAnnotationReader
    );

    $connectionParams = [
        'dbname'   => getenv('DB_NAME'),
        'user'     => getenv('DB_USER'),
        'password' => getenv('DB_PASS'),
        'host'     => getenv('DB_HOST'),
        'port'     => getenv('DB_PORT'),
        'driver'   => getenv('DB_DRIVER'),
        'charset'  => 'utf8'
    ];

    return EntityManager::create($connectionParams, $config);
};
