<?php

namespace Usecase\CounterManager;

use Domain\Counter\CounterInterface;

class CounterManager
{
  public function __construct(
    readonly private CounterRepositoryInterface $repository,
    CounterInterface ...$counters,
  ) {
    foreach ($counters as $counter) {
      $this->repository->apply($counter);
    }
  }

  public function set(CounterInterface $counter)
  {
    $this->repository->apply($counter);
  }

  public function remove(CounterInterface $counter)
  {
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
