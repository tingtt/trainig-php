<?php

namespace Infrastructure\Server;

use AltoRouter;

class Router
{
  private AltoRouter $router;

  public function __construct(string $basePath)
  {
    $this->router = new AltoRouter([], $basePath);
    $this->router->map('GET', '/', function () {
      echo "<p>Welcome to PHP</p>";
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
