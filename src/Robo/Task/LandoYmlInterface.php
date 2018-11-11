<?php

namespace RoboGary\Robo\Task;

/**
 * Interface LandoYmlInterface
 *
 * @package RoboGary\Robo\Task
 */
interface LandoYmlInterface {

  /**
   * Build config array structure.
   *
   * return array
   */
  public function buildConfig();

  /**
   * Set the config.
   *
   * @param array $config
   *
   * @return \RoboGary\Robo\Task\LandoYmlInterface
   */
  public function setConfig(array $config);

  /**
   * Get the config.
   *
   * @return array
   */
  public function getConfig();
}
