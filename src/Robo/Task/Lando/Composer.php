<?php

namespace RoboGary\Robo\Task\Lando;

use TheReference\Robo\Task\Lando\Base;

class Composer extends Base {

  /**
   * {@inheritdoc}
   */
  protected $action = "composer";

  /**
   * {@inheritdoc}
   */
  protected $yes = FALSE;

  /**
   * {@inheritdoc}
   */
  public function getTaskInfo() {
    return 'Running a composer command within a Lando application.';
  }

}
