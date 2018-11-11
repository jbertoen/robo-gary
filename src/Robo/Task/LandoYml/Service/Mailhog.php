<?php

namespace RoboGary\Robo\Task\LandoYml\Service;

use RoboGary\Robo\Task\LandoYml\ServiceBase;

/**
 * Class Mailhog
 *
 * @package RoboGary\Robo\Task\LandoYml\Service
 */
class Mailhog extends ServiceBase {

  /**
   * Lando service type.
   *
   * @var string
   */
  protected $type = 'mailhog';

  /**
   * Lando service name.
   *
   * @var string
   */
  protected $name = 'mailhog';

  /**
   * Lando service portforward.
   *
   * @var bool|int
   */
  protected $portforward = TRUE;

  /**
   * Hogfrom service names.
   *
   * @var array
   */
  protected $hogfrom = [];

  /**
   * Add a service to hog the mails from.
   *
   * @param string $service
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Mailhog
   */
  public function addHogFromService($service) {
    $this->hogfrom[] = $service;
    return $this;
  }

  /**
   * Get the names of the services to hog mails from.
   *
   * @return array
   */
  public function getHogFromServices() {
    return $this->hogfrom;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfig() {
    $serviceConfig = parent::buildConfig();
    $serviceConfig['hogfrom'] = $this->getHogFromServices();
    return $serviceConfig;
  }

}
