<?php

namespace RoboGary\Robo\Task\Lando;

use Bitbucket\Api\Repositories\Users;
use RoboGary\Robo\Task\Bitbucket\BitbucketBase;

class CreateBranchPermission extends BitbucketBase {

  /**
   * {@inheritdoc}
   * @throws \Http\Client\Exception
   */
  public function run() {
    $client = $this->getClient();
    $user = new Users($client->getHttpClient(), $this->teamName);
    $branchRestrictions = $user->branchRestrictions($this->repository);
    $branchRestrictions->create($this->param);
  }

}
