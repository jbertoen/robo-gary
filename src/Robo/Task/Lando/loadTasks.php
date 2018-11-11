<?php

namespace RoboGary\Robo\Task\Lando;

/**
 * Trait loadTasks
 *
 * @package RoboGary\Robo\Task\Lando
 */
trait loadTasks {

  /**
   * Get the Composer task.
   *
   * @param string $pathToLando
   *
   * @return \RoboGary\Robo\Task\Lando\Composer
   */
  protected function taskLandoComposer($pathToLando = NULL) {
    return $this->task(Composer::class, $pathToLando);
  }

  /**
   * Get the Drush task.
   *
   * @param string $pathToLando
   *
   * @return \RoboGary\Robo\Task\Lando\Drush
   */
  protected function taskLandoConfig($pathToLando = NULL) {
    return $this->task(Drush::class, $pathToLando);
  }

  /**
   * Get the Drupal Console task.
   *
   * @param string $pathToLando
   *
   * @return \RoboGary\Robo\Task\Lando\Drupal
   */
  protected function taskLandoDrupal($pathToLando = NULL) {
    return $this->task(Drupal::class, $pathToLando);
  }
}
