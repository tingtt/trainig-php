<?php

use Domain\Counter\Counter;

describe('Counter __constructor', function () {
  it('may initialize', function (int $num) {
    $counter = new Counter($num);

    expect($counter->num)->toBe($num);
  })->with([
    0, 10, 100
  ]);

  it('may initialize with a value fitted between 0 and 100', function (int $num, int $expect) {
    $counter = new Counter($num);

    expect($counter->num)->toBe($expect);
  })->with([
    [-1, 0],
    [0, 0],
    [10, 10],
    [101, 100],
  ]);
});

describe('Counter increase', function () {
  it('may increase', function (int $from, int $expect) {
    $counter = new Counter($from);
    $result = $counter->increase();

    expect($result->num)->toBe($expect);
  })->with([
    [0, 1],
    [10, 11],
    [100, 100],
  ]);
});

describe('Counter decrease', function () {
  it('may decrease', function (int $from, int $expect) {
    $counter = new Counter($from);
    $result = $counter->decrease();

    expect($result->num)->toBe($expect);
  })->with([
    [0, 0],
    [10, 9],
    [100, 99],
  ]);
});
