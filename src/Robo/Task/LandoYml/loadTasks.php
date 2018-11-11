<?php

namespace RoboGary\Robo\Task\Lando;

use RoboGary\Robo\Task\LandoYml\Service\Custom;
use RoboGary\Robo\Task\LandoYml\Service\Mailhog;
use RoboGary\Robo\Task\LandoYml\Service\Nginx;
use RoboGary\Robo\Task\LandoYml\Service\Redis;
use RoboGary\Robo\Task\LandoYml\Service\Solr;

/**
 * Trait loadTasks
 *
 * @package RoboGary\Robo\Task\Lando
 */
trait loadTasks {

  /**
   * Get the Custom Service task.
   *
   * @param string $filePath
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Custom
   */
  protected function taskLandoYmlServiceCustom($filePath = './.lando.yml') {
    return $this->task(Custom::class, $filePath);
  }

  /**
   * Get the Mailhog Service task.
   *
   * @param string $filePath
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Mailhog
   */
  protected function taskLandoYmlServiceMailhog($filePath = './.lando.yml') {
    return $this->task(Mailhog::class, $filePath);
  }

  /**
   * Get the Nginx Service task.
   *
   * @param string $filePath
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Nginx
   */
  protected function taskLandoYmlServiceNginx($filePath = './.lando.yml') {
    return $this->task(Nginx::class, $filePath);
  }

  /**
   * Get the Solr Service task.
   *
   * @param string $filePath
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Solr
   */
  protected function taskLandoYmlServiceSolr($filePath = './.lando.yml') {
    return $this->task(Solr::class, $filePath);
  }

  /**
   * Get the Redis Service task.
   *
   * @param string $filePath
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Redis
   */
  protected function taskLandoYmlServiceRedis($filePath = './.lando.yml') {
    return $this->task(Redis::class, $filePath);
  }

}
