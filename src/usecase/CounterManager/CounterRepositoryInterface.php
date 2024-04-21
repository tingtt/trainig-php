<?php

namespace Usecase\CounterManager;

use Domain\Counter\CounterInterface;

interface CounterRepositoryInterface
{
  /**
   * @return CounterInterface[]
   */
  public function findAll(): array;
  public function apply(CounterInterface $counter);
  public function remove(CounterInterface $counter);
}
