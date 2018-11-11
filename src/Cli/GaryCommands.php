<?php

namespace RoboGary\Cli;

class GaryCommands extends \Robo\Tasks {

  /**
   * Multiply two numbers together
   *
   * @command multiply
   */
  public function multiply($a, $b) {
    $model = new \RoboGary\Example($a);
    $result = $model->multiply($b);

    $this->io()->text("$a times $b is $result");
  }
}
