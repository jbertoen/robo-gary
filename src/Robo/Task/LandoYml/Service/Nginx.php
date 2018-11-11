<?php

namespace RoboGary\Robo\Task\LandoYml\Service;

use RoboGary\Robo\Task\LandoYml\ServiceBase;

/**
 * Class Nginx
 *
 * @package RoboGary\Robo\Task\LandoYml\Service
 */
class Nginx extends ServiceBase {

  /**
   * Lando service type.
   *
   * @var string
   */
  protected $type = 'nginx';

  /**
   * Webroot for the files to serve.
   *
   * @var string
   */
  protected $webroot = './';

  /**
   * Set the webroot to serve the files from.
   *
   * @param string $webroot
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Nginx
   */
  public function setWebroot($webroot) {
    $this->webroot = $webroot;
    return $this;
  }

  /**
   * Get the webroot to serve the files from.
   *
   * @return string
   */
  public function getWebroot() {
    return $this->webroot;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfig() {
    $serviceConfig = parent::buildConfig();
    $serviceConfig['webroot'] = $this->getWebroot();
    return $serviceConfig;
  }

}
