<?php

declare(strict_types=1);
error_reporting(0);
require_once(__DIR__ . '/vendor/autoload.php');

use Infrastructure\Server\Router;

$router = new Router('' /* basePath */);
$router->run();
