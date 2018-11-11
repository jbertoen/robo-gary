<?php

namespace RoboGary\Robo\Task\LandoYml\Service;

use RoboGary\Robo\Task\LandoYml\ServiceBase;

/**
 * Class Redis
 *
 * @package RoboGary\Robo\Task\LandoYml\Service
 */
class Redis extends ServiceBase {

  /**
   * Lando service type.
   *
   * @var string
   */
  protected $type = 'redis';

  /**
   * Lando service name.
   *
   * @var string
   */
  protected $name = 'redis';

  /**
   * Lando service portforward.
   *
   * @var bool|int
   */
  protected $portforward = TRUE;

  /**
   * {@inheritdoc}
   */
  public function buildConfig() {
    return parent::buildConfig();
  }

}
