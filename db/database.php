<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$container['doctrine'] = static function () {
    $paths = [__DIR__ . '/../../src'];
    $isDevMode = true;

    $config = Setup::createAnnotationMetadataConfiguration(
        $paths,
        $isDevMode
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
//    $connectionParams = [
//        'url'   => 'mysql://root:123456@192.168.3.244:4003/database'
//    ];

    return EntityManager::create($connectionParams, $config);
};
