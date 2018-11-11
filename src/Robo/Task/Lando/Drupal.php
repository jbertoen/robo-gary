<?php

namespace RoboGary\Robo\Task\Lando;

use TheReference\Robo\Task\Lando\Base;

class Drupal extends Base {

  /**
   * {@inheritdoc}
   */
  protected $action = "drupal";

  /**
   * {@inheritdoc}
   */
  protected $yes = FALSE;

  /**
   * {@inheritdoc}
   */
  public function getTaskInfo() {
    return 'Running a drupal command within a Lando application.';
  }

}
