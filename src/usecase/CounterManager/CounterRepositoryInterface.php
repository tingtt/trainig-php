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

class CounterRepository implements CounterRepositoryInterface
{
  /**
   * @return CounterInterface[]
   */
  public function findAll(): array
  {
    // TODO: SQL文 発行
    return [];
  }

  public function apply(CounterInterface $counter)
  {
    // TODO: SQL文 発行
  }

  public function remove(CounterInterface $counter)
  {
    // TODO: SQL文 発行
  }
}
