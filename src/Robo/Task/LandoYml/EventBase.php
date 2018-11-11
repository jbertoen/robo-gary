<?php

namespace RoboGary\Robo\Task\LandoYml;

use Robo\Result;
use Robo\Task\BaseTask;

/**
 * Class EventBase
 *
 * @package RoboGary\Robo\Task\LandoYml
 */
abstract class EventBase extends BaseTask {

  use FileTrait;

  /**
   * Lando event name.
   *
   * @var string
   */
  protected $name;

  /**
   * Lando event commands.
   *
   * @var array
   */
  protected $commands;

  /**
   * Service constructor.
   *
   * @param string $filePath
   */
  public function __construct($filePath = './.lando.yml') {
    $this->setFilePath($filePath);
    $this->decodeFile();
  }

  /**
   * Get the lando event name.
   *
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Add a command to execute on a service on an event.
   *
   * @param string $serviceName
   * @param string $command
   */
  public function addCommand($serviceName, $command) {
    $this->commands[] = $serviceName . ': ' . $command;
  }

  /**
   * Get all event commands.
   *
   * @return array
   */
  public function getCommands() {
    return $this->commands;
  }

  /**
   * Build service config array structure.
   *
   * return array
   */
  public function buildConfig() {
    $config = [];
    $config[$this->getName()] = $this->getCommands();
    return $config;
  }

  /**
   * Set the event config.
   *
   * @param array $config
   *
   * @return \RoboGary\Robo\Task\LandoYml\EventBase
   */
  public function setConfig(array $config) {
    $ymlConfig = $this->getYmlConfig();
    $ymlConfig['events'][$this->getName()] = $config;
    $this->setYmlConfig($ymlConfig);
    return $this;
  }

  /**
   * Get the event config.
   *
   * @return array
   */
  public function getConfig() {
    $ymlConfig = $this->getYmlConfig();
    if (!isset($ymlConfig['events'][$this->getName()])) {
      return [];
    }

    return $ymlConfig['events'][$this->getName()];
  }

  /**
   * {@inheritdoc}
   * @throws \Http\Client\Exception
   */
  public function run() {
    $this->setConfig($this->buildConfig());
    $this->encodeFile();
    return new Result(
      $this,
      Result::EXITCODE_OK
    );
  }

}
