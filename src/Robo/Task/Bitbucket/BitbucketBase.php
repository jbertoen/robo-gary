<?php

namespace RoboGary\Robo\Task\Bitbucket;

use Bitbucket\Client;
use Robo\Task\BaseTask;

abstract class BitbucketBase extends BaseTask {

  /**
   * Bitbucket username.
   *
   * @var string
   */
  protected $username;

  /**
   * Bitbucket password.
   *
   * @var string
   */
  protected $password;

  /**
   * Bitbucket repository.
   *
   * @var string
   */
  protected $repository;

  /**
   * Bitbucket team name.
   *
   * @var string
   */
  protected $teamName;

  /**
   * Param for the task.
   *
   * @var string
   */
  protected $param;

  /**
   * BitbucketBase constructor.
   *
   * @param string $username
   * @param string $password
   * @param string $repository
   */
  public function __construct($username, $password, $repository) {
    $this->username = $username;
    $this->password = $password;
    $this->repository = $repository;
  }

  /**
   * Set Bitbucket username.
   *
   * @param string $username
   */
  public function setUsername($username) {
    $this->username = $username;
    return $this;
  }

  /**
   * Set Bitbucket password.
   *
   * @param string $password
   */
  public function setPassword($password) {
    $this->password = $password;
    return $this;
  }

  /**
   * Set Bitbucket repository name.
   *
   * @param string $repository
   */
  public function setRepository($repository) {
    $this->repository = $repository;
    return $this;
  }

  /**
   * Set param.
   *
   * @param string $param
   */
  public function setParam($param) {
    $this->param = $param;
    return $this;
  }

  /**
   * Set team name.
   *
   * @param string $teamName.
   */
  public function setTeamName($teamName) {
    $this->teamName = $teamName;
    return $this;
  }

  /**
   * Get Bitbucket client object.
   *
   * @return \Bitbucket\Client
   */
  protected function getClient() {
    $client = new Client();
    $client->authenticate(Client::AUTH_HTTP_PASSWORD, $this->username, $this->password);
    return $client;
  }
}
