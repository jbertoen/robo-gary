<?php

namespace RoboGary\Robo\Task\Lando;

use TheReference\Robo\Task\Lando\Base;

class Drush extends Base {

  /**
   * {@inheritdoc}
   */
  protected $action = "drush";

  /**
   * {@inheritdoc}
   */
  protected $yes = FALSE;

  /**
   * {@inheritdoc}
   */
  public function getTaskInfo() {
    return 'Running a drush command within a Lando application.';
  }
}
