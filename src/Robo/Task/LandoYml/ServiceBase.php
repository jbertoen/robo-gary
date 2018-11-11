<?php

namespace RoboGary\Robo\Task\LandoYml;

use Robo\Result;
use Robo\Task\BaseTask;
use RoboGary\Robo\Task\LandoYmlInterface;

/**
 * Class ServiceBase
 *
 * @package RoboGary\Robo\Task\LandoYml
 */
abstract class ServiceBase extends BaseTask implements LandoYmlInterface {

  use FileTrait;

  /**
   * Lando service type.
   *
   * @var string
   */
  protected $type;

  /**
   * Lando service name.
   *
   * @var string
   */
  protected $name;

  /**
   * Lando service portforward.
   *
   * @var bool|int
   */
  protected $portforward;

  /**
   * List of lando service volume mappings.
   *
   * @var array
   */
  protected $volumes;

  /**
   * List of lando service environment variables.
   *
   * @var array
   */
  protected $environmentVar;

  /**
   * Version of the service to run.
   *
   * @var string
   */
  protected $version;

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
   * Get the lando service type.
   *
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * Get the lando service name.
   *
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Get the portforward setting.
   *
   * @return bool|int
   */
  public function getPortforward() {
    return $this->portforward;
  }

  /**
   * Get the lando service version.
   *
   * @return string
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * Set the lando service version.
   *
   * @param string $version
   *
   * @return \RoboGary\Robo\Task\LandoYml\ServiceBase
   */
  public function setVersion($version) {
    $this->version = $version;
    return $this;
  }

  /**
   * Set a lando service volume mapping.
   *
   * @param string $volumeFrom
   * @param string $volumeTo
   *
   * @return \RoboGary\Robo\Task\LandoYml\ServiceBase
   */
  public function setVolume($volumeFrom, $volumeTo) {
    $this->volumes[$volumeFrom] = $volumeTo;
    return $this;
  }

  /**
   * Get the lando service volume mapping.
   *
   * @return array
   */
  public function getVolumes() {
    return $this->volumes;
  }

  /**
   * Set a lando service environment variable.
   *
   * @param string $key
   * @param string $value
   *
   * @return \RoboGary\Robo\Task\LandoYml\ServiceBase
   */
  public function setEnvironmentVar($key, $value) {
    $this->environmentVar[$key] = $value;
    return $this;
  }

  /**
   * Get a lando service environment variable.
   *
   * @return array
   */
  public function getEnvironmentVar() {
    return $this->environmentVar;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfig() {
    $config = [];

    $config['type'] = $this->getType();
    if (!empty($this->getVersion())) {
      $config['type'] .= ':' . $this->getVersion();
    }

    if (!empty($this->getPortforward())) {
      $config['portforward'] = $this->getPortforward();
    }

    if (!empty($this->getEnvironmentVar())) {
      $config['overrides']['services']['environment'] = $this->getEnvironmentVar();
    }

    if (!empty($this->volumes)) {
      $config['overrides']['services']['volumes'] = $this->getVolumes();
    }

    return $config;
  }

  /**
   * {@inheritdoc}
   */
  public function setConfig(array $config) {
    $ymlConfig = $this->getYmlConfig();
    $ymlConfig['services'][$this->getName()] = $config;
    $this->setYmlConfig($ymlConfig);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig() {
    $ymlConfig = $this->getYmlConfig();
    if (!isset($ymlConfig['services'][$this->getName()])) {
      return [];
    }

    return $ymlConfig['services'][$this->getName()];
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
