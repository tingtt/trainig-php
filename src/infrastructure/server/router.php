<?php

namespace Infrastructure\Server;

use AltoRouter;
use InterfaceAdapter\Controller\ControllerInterface;

class Router
{
  private AltoRouter $router;

  public function __construct(
    readonly private ControllerInterface $controller,
    string $basePath,
  ) {
    $this->router = new AltoRouter([], $basePath);
    $this->router->map('GET', '/', function () {
      $list = $this->controller->getCounterList();
      echo json_encode($list);
    });
  }

  public function run()
  {
    $match = $this->router->match();
    if ($match === false) {
      http_response_code(404);
      echo 'Not found';
      return;
    }
    $match['target']();
  }
}
