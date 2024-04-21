<?php

use InterfaceAdapter\Controller\Controller;
use Usecase\CounterManager\CounterManager;

describe('Controller getCounterList', function () {
  /**
   * @return \Mockery\LegacyMockInterface&\Mockery\MockInterface&mixed $counterManager
   */
  function mockCounterManager()
  {
    $counterManager = Mockery::mock(CounterManager::class);
    return $counterManager;
  }

  it('may get counter list', function () {
    $counterManager = mockCounterManager();
    $counterManager->shouldReceive('findAll')->once()
      ->andReturn([]);
    $controller = new Controller($counterManager);

    expect(count($controller->getCounterList()))->toBe(0);
  });
});
