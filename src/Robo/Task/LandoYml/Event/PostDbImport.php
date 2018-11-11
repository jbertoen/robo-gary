<?php

namespace RoboGary\Robo\Task\LandoYml\Event;

use RoboGary\Robo\Task\LandoYml\EventBase;

/**
 * Class PostDbImport
 *
 * @package RoboGary\Robo\Task\LandoYml\Event
 */
class PostDbImport extends EventBase {

  /**
   * Lando event name.
   *
   * @var string
   */
  protected $name = 'post-db-import';

}
