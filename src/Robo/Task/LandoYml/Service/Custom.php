<?php

namespace RoboGary\Robo\Task\LandoYml\Service;

use RoboGary\Robo\Task\LandoYml\ServiceBase;

/**
 * Class Custom
 *
 * @package RoboGary\Robo\Task\LandoYml\Service
 */
class Custom extends ServiceBase {

  /**
   * Anything conform the array structure to merge with the default service
   * lando build.
   *
   * @var array
   */
  protected $customServiceConfig = [];

  /**
   * Custom constructor.
   *
   * @param string $name
   * @param string $type
   * @param string $filePath
   */
  public function __construct($name, $type, $filePath = './.lando.yml') {
    parent::__construct($filePath);
    $this->setName($name);
    $this->setType($type);
  }

  /**
   * Set the lando service name.
   *
   * @param string $name
   *
   * @return \RoboGary\Robo\Task\LandoYml\ServiceBase
   */
  private function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * Set the lando service type.
   *
   * @param string $type
   *
   * @return \RoboGary\Robo\Task\LandoYml\ServiceBase
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * Set the custom service configuration.
   *
   * @param array $customServiceConfig
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Custom
   */
  public function setCustomServiceConfig(array $customServiceConfig) {
    $this->customServiceConfig = $customServiceConfig;
    return $this;
  }

  /**
   * Get the custom service configuration.
   *
   * @return array
   */
  public function getCustomServiceConfig() {
    return $this->customServiceConfig;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfig() {
    return array_merge(parent::buildConfig(), $this->getCustomServiceConfig());
  }

}
