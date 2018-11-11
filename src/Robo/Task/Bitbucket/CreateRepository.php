<?php

namespace RoboGary\Robo\Task\Lando;

use Bitbucket\Api\Repositories\Users;
use RoboGary\Robo\Task\Bitbucket\BitbucketBase;

class CreateRepository extends BitbucketBase {

  /**
   * {@inheritdoc}
   * @throws \Http\Client\Exception
   */
  public function run() {
    $client = $this->getClient();
    $repositories = new Users($client->getHttpClient(), $this->teamName);
    $repositories->create(strtolower($this->repository), $this->param);
  }

}
