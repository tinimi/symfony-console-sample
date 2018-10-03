#!/usr/bin/env php
<?php
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__));
$loader->load('services.yaml');
$container->compile();

$app = new Application('test', '0.0.1');

$serviceIds = $container->findTaggedServiceIds('my.command');
foreach ($serviceIds as $serviceId => $tags) {
    $app->add($container->get($serviceId));
}

$app->run();
