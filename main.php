<?php

declare(strict_types=1);
error_reporting(0);
require_once(__DIR__ . '/vendor/autoload.php');

use Infrastructure\DataSource\CounterRepository\CounterRepository;
use Infrastructure\Server\Router;
use InterfaceAdapter\Controller\Controller;
use Usecase\CounterManager\CounterManager;

/**
 * @return \Infrastructure\Server\Router
 */
function app(string $basePath)
{
  $counterRepository = new CounterRepository();
  $counterManager = new CounterManager($counterRepository);
  $controller = new Controller($counterManager);
  $router = new Router($controller, $basePath);
  return $router;
}

app('' /* basePath */)->run();
