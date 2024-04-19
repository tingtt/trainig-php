<?php

namespace Usecase\CounterManager;

use Domain\Counter\CounterInterface;

class CounterManager
{
  private array $counterCollection;

  public function __construct(CounterInterface ...$counters)
  {
    $this->counterCollection = [];
    foreach ($counters as $counter) {
      $this->counterCollection[$counter->id] = $counter;
    }
  }

  public function set(CounterInterface $counter)
  {
    $this->counterCollection[$counter->id] = $counter;;
  }

  public function remove(CounterInterface $counter)
  {
    unset($this->counterCollection[$counter->id]);
  }

  /**
   * @return CounterInterface[]
   */
  public function findAll()
  {
    return $this->counterCollection;
  }
}
