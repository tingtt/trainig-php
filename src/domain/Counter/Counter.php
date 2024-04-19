<?php

namespace Domain\Counter;

/**
 * @property string $id
 * @property int $num
 */
interface CounterInterface
{
  const int MAX = 100;
  const int MIN = 0;

  public function increase(): self;
  public function decrease(): self;
}

class Counter implements CounterInterface
{
  readonly string $id;
  readonly int $num;

  public function __construct(int $num = 0)
  {
    $this->id = uniqid();
    $this->num = $this->fit_between($num, self::MIN, self::MAX);
  }

  private function fit_between(int $num, int $min, int $max): int
  {
    if ($num <= $min) {
      return $min;
    }
    if ($num >= $max) {
      return $max;
    }
    return $num;
  }

  public function increase(): self
  {
    return new self($this->num + 1);
  }

  public function decrease(): self
  {
    return new self($this->num - 1);
  }
}
