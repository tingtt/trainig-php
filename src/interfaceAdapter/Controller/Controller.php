<?php

namespace InterfaceAdapter\Controller;

use Domain\Counter\CounterInterface;
use Usecase\CounterManager\CounterManager;

interface ControllerInterface
{
  /**
   * @return CounterInterface[]
   */
  public function getCounterList();
}

class Controller implements ControllerInterface
{
  public  function __construct(
    readonly private CounterManager $counterManager,
  ) {
  }

  /**
   * @return CounterInterface[]
   */
  public function getCounterList()
  {
    return $this->counterManager->findAll();
  }
}
