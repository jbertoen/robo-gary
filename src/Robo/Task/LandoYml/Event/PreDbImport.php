<?php

namespace RoboGary\Robo\Task\LandoYml\Event;

use RoboGary\Robo\Task\LandoYml\EventBase;

/**
 * Class PreDbImport
 *
 * @package RoboGary\Robo\Task\LandoYml\Event
 */
class PreDbImport extends EventBase {

  /**
   * Lando event name.
   *
   * @var string
   */
  protected $name = 'pre-db-import';

}
