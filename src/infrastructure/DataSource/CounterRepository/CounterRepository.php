<?php

namespace Infrastructure\DataSource\CounterRepository;

use Domain\Counter\CounterInterface;
use Usecase\CounterManager\CounterRepositoryInterface;

class CounterRepository implements CounterRepositoryInterface
{
  private array $counterCollection;

  /**
   * @return CounterInterface[]
   */
  public function findAll(): array
  {
    // 実際には DB への SQL 発行などを行う。
    return $this->counterCollection;
  }

  public function apply(CounterInterface $counter)
  {
    // 実際には DB への SQL 発行などを行う。
    $this->counterCollection[$counter->id] = $counter;
  }

  public function remove(CounterInterface $counter)
  {
    // 実際には DB への SQL 発行などを行う。
    unset($this->counterCollection[$counter->id]);
  }
}
