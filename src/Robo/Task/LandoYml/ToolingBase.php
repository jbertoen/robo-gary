<?php

namespace RoboGary\Robo\Task\LandoYml;

use Robo\Task\BaseTask;
use RoboGary\Robo\Task\LandoYmlInterface;

/**
 * Class ToolingBase
 *
 * @package RoboGary\Robo\Task\LandoYml
 */
abstract class ToolingBase extends BaseTask implements LandoYmlInterface {

  use FileTrait;

  /**
   * Lando tool name.
   *
   * @var string
   */
  protected $name;

  /**
   * Lando tool service.
   *
   * @var string
   */
  protected $service;

  /**
   * Lando tool description.
   *
   * @var string
   */
  protected $description;

  /**
   * Lando tool cli commands.
   *
   * @var array
   */
  protected $commands;

  /**
   * Lando tool user to execute the tool as.
   *
   * @var string
   */
  protected $user;

  /**
   * Lando tool service dependencies.
   *
   * @var array
   */
  protected $needs;

  /**
   * Service constructor.
   *
   * @param string $filePath
   *
   * @throws \Robo\Exception\TaskException
   */
  public function __construct($filePath = './lando.yml') {
    $this->setFilePath($filePath);
    $this->decodeFile();
  }

  /**
   * Get the name of the tool.
   *
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Set the name of the tool.
   *
   * @param string $name
   *
   * @return \RoboGary\Robo\Task\LandoYml\ToolingBase
   */
  public function setName(string $name) {
    $this->name = $name;
    return $this;
  }

  /**
   * Get the service to execute the tool on.
   *
   * @return string
   */
  public function getService() {
    return $this->service;
  }

  /**
   * Set the service to execute the tool on.
   *
   * @param string $service
   *
   * @return \RoboGary\Robo\Task\LandoYml\ToolingBase
   */
  public function setService(string $service) {
    $this->service = $service;
    return $this;
  }

  /**
   * Get the description of the tool.
   *
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * Set the description of the tool.
   *
   * @param string $description
   *
   * @return \RoboGary\Robo\Task\LandoYml\ToolingBase
   */
  public function setDescription(string $description) {
    $this->description = $description;
    return $this;
  }

  /**
   * Get the cli commands.
   *
   * @return array
   */
  public function getCommands(): array {
    return $this->commands;
  }

  /**
   * Add a cli command.
   *
   * @param string $command
   *
   * @return \RoboGary\Robo\Task\LandoYml\ToolingBase
   */
  public function addCommand($command) {
    $this->commands[] = $command;
    return $this;
  }

  /**
   * Get the user of the service to execute the tool.
   *
   * @return string
   */
  public function getUser() {
    return $this->user;
  }

  /**
   * Set the user of the service to execute the tool.
   *
   * @param string $user
   *
   * @return \RoboGary\Robo\Task\LandoYml\ToolingBase
   */
  public function setUser(string $user) {
    $this->user = $user;
    return $this;
  }

  /**
   * Get the service dependencies of the tool to execute.
   *
   * @return array
   */
  public function getNeeds() {
    return $this->needs;
  }

  /**
   * Add a service dependency.
   *
   * @param string $need
   *
   * @return \RoboGary\Robo\Task\LandoYml\ToolingBase
   */
  public function addNeed($need) {
    $this->needs[] = $need;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfig() {
    $config = [];

    if (!empty($this->getDescription())) {
      $config['description'] = $this->getDescription();
    }

    if (!empty($this->getService())) {
      $config['service'] = $this->getService();
    }

    if (!empty($this->getUser())) {
      $config['user'] = $this->getUser();
    }

    if (!empty($this->getCommands())) {
      $config['cmd'] = $this->getCommands();
    }

    if (!empty($this->getNeeds())) {
      $config['needs'] = $this->getNeeds();
    }

    return $config;
  }

  /**
   * {@inheritdoc}
   */
  public function setConfig(array $config) {
    $ymlConfig = $this->getYmlConfig();
    $ymlConfig['tooling'][$this->getName()] = $config;
    $this->setYmlConfig($ymlConfig);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig() {
    $ymlConfig = $this->getYmlConfig();
    if (!isset($ymlConfig['tooling'][$this->getName()])) {
      return [];
    }

    return $ymlConfig['tooling'][$this->getName()];
  }

}
