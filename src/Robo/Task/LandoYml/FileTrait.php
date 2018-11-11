<?php

namespace RoboGary\Robo\Task\LandoYml;

use Robo\Task\BaseTask;
use Symfony\Component\Yaml\Yaml;

trait FileTrait {

  /**
   * Lando yml array info file.
   *
   * @var array
   */
  protected $ymlConfig;

  /**
   * Path to .lando.yml file.
   *
   * @var string
   */
  protected $filePath;

  /**
   * Set the lando file path.
   *
   * @param string $filePath
   *
   * @return \RoboGary\Robo\Task\LandoYml\FileTrait
   */
  public function setFilePath($filePath) {
    $this->filePath = $filePath;
    return $this;
  }

  /**
   * Get the lando file path.
   *
   * @return string
   */
  public function getFilePath() {
    return $this->filePath;
  }

  /**
   * Set the lando file.
   *
   * @param array $ymlConfig
   *
   * @return \RoboGary\Robo\Task\LandoYml\FileTrait
   */
  public function setYmlConfig(array $ymlConfig) {
    $this->ymlConfig = $ymlConfig;
    return $this;
  }

  /**
   * Get the lando file.
   *
   * @return array
   */
  public function getYmlConfig() {
    return $this->ymlConfig;
  }

  /**
   * Parse a lando yml file into an array structure.
   */
  public function decodeFile() {
    $symfonyYaml = new Yaml();
    $this->setYmlConfig($symfonyYaml::parseFile($this->getFilePath()));
  }

  /**
   * Parse a lando yml file into an array structure.
   */
  public function encodeFile() {
    $symfonyYaml = new Yaml();
    $landoYmlContent = $symfonyYaml::dump($this->getYmlConfig(), 6, 2);
    file_put_contents($this->getFilePath(), $landoYmlContent);
  }

}
