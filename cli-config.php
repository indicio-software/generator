<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Slim\Container;

require dirname(__DIR__).'/../../init.php';

/** @var Container $container */
$container = require __DIR__ . '/bootstrap.php';

/** @var EntityManager $em */
$em = $container[EntityManager::class];
//$em->getConnection()->getConfiguration()->setFilterSchemaAssetsExpression('/^(time_manager).*$/');

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

ConsoleRunner::run(
    ConsoleRunner::createHelperSet($em)
);
