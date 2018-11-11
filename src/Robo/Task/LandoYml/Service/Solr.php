<?php

namespace RoboGary\Robo\Task\LandoYml\Service;

use RoboGary\Robo\Task\LandoYml\ServiceBase;

/**
 * Class Solr
 *
 * @package RoboGary\Robo\Task\LandoYml\Service
 */
class Solr extends ServiceBase {

  /**
   * Lando service type.
   *
   * @var string
   */
  protected $type = 'solr';

  /**
   * Lando service name.
   *
   * @var string
   */
  protected $name = 'solr';

  /**
   * Lando service portforward.
   *
   * @var bool|int
   */
  protected $portforward = TRUE;

  /**
   * SOLR Core name.
   *
   * @var string
   */
  protected $solrCoreName = 'project';

  /**
   * SOLR configuration files path.
   *
   * @var string
   */
  protected $solrCoreConf = 'config/shared/solr';

  /**
   * Set the name of the SOLR Core to use.
   *
   * @param string $solrCoreName
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Solr
   */
  public function setSolrCoreName($solrCoreName) {
    $this->solrCoreName = $solrCoreName;
    return $this;
  }

  /**
   * Get the name of the SOLR Core to use.
   *
   * @return string
   */
  public function getSolrCoreName() {
    return $this->solrCoreName;
  }

  /**
   * Set the path of the SOLR Config to use.
   *
   * @param string $solrCoreConf
   *
   * @return \RoboGary\Robo\Task\LandoYml\Service\Solr
   */
  public function setSolrConfPath($solrCoreConf) {
    $this->solrCoreConf = $solrCoreConf;
    return $this;
  }

  /**
   * Get the path of the SOLR Config to use.
   *
   * @return string
   */
  public function getSolrConfPath() {
    return $this->solrCoreConf;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfig() {
    $serviceConfig = parent::buildConfig();
    $serviceConfig['project'] = $this->getSolrCoreName();
    $serviceConfig['config']['conf'] = $this->getSolrConfPath();
    return $serviceConfig;
  }

}
