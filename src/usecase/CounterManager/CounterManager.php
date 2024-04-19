<?php

namespace Usecase\CounterManager;

use Domain\Counter\CounterInterface;

class CounterManager
{
  private array $counterCollection;

  public function __construct(
    readonly private CounterRepositoryInterface $repository,
    CounterInterface ...$counters,
  ) {
    $this->counterCollection = [];

    foreach ($counters as $counter) {
      $this->counterCollection[$counter->id] = $counter;
      $this->repository->apply($counter);
    }
  }

  public function set(CounterInterface $counter)
  {
    $this->counterCollection[$counter->id] = $counter;
    $this->repository->apply($counter);
  }

  public function remove(CounterInterface $counter)
  {
    unset($this->counterCollection[$counter->id]);
    $this->repository->remove($counter);
  }

  /**
   * @return CounterInterface[]
   */
  public function findAll()
  {
    return $this->repository->findAll();
  }
}
