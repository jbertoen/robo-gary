<?php

namespace RoboGary\Robo\Task\LandoYml\Event;

use RoboGary\Robo\Task\LandoYml\EventBase;

/**
 * Class Custom
 *
 * @package RoboGary\Robo\Task\LandoYml\Event
 */
class Custom extends EventBase {

  /**
   * Custom constructor.
   *
   * @param string $name
   * @param string $filePath
   */
  public function __construct($name, string $filePath = './.lando.yml') {
    parent::__construct($filePath);
    $this->setName($name);
  }

  /**
   * Set the lando event name.
   *
   * @param string $name
   *
   * @return \RoboGary\Robo\Task\LandoYml\EventBase
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

}
