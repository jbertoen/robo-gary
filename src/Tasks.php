<?php

namespace RoboGary;

use Robo\Common\IO;
use Robo\Contract\IOAwareInterface;
use Robo\Contract\BuilderAwareInterface;
use League\Container\ContainerAwareInterface;
use League\Container\ContainerAwareTrait;
use Robo\Result;

class Tasks implements BuilderAwareInterface, IOAwareInterface, ContainerAwareInterface {

  use ContainerAwareTrait;
  use LoadAllTasks; // uses TaskAccessor, which uses BuilderAwareTrait

  use IO;

  /**
   * @param bool $stopOnFail
   */
  protected function stopOnFail($stopOnFail = TRUE) {
    Result::$stopOnFail = $stopOnFail;
  }
}
