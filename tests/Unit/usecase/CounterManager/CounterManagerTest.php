<?php

use Domain\Counter\CounterInterface;
use Usecase\CounterManager\CounterManager;

describe('CounterManager', function () {
  /**
   * @return \Mockery\LegacyMockInterface&\Mockery\MockInterface&mixed $counterA_0
   */
  function mockCounterA_0()
  {
    $counterA_0 = Mockery::mock(CounterInterface::class);
    $counterA_0->id = 'A';
    $counterA_0->num = 0;
    return $counterA_0;
  }

  it('may set Counter', function () {
    $counterA_0 = mockCounterA_0();

    $manager = new CounterManager();
    $manager->set($counterA_0);

    expect($manager->findAll()[$counterA_0->id]->num)->toBe(0);
  });

  it('may set exists Counter', function () {
    $counterA_0 = mockCounterA_0();

    $manager = new CounterManager();
    $manager->set($counterA_0);
    $counterA_0->num = $counterA_0->num + 1;
    $manager->set($counterA_0);

    expect($manager->findAll()[$counterA_0->id]->num)
      ->toBe($counterA_0->num);
  });

  it('may remove Counter', function () {
    $counterA_0 = mockCounterA_0();

    $manager = new CounterManager($counterA_0);
    $manager->remove($counterA_0);

    expect($manager->findAll())->toBe([]);
  });

  it('may remove not exists Counter', function () {
    $counterA_0 = mockCounterA_0();

    $manager = new CounterManager();
    $manager->remove($counterA_0);

    expect($manager->findAll())->toBe([]);
  });
});
