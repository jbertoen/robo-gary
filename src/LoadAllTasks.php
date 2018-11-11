<?php

namespace RoboGary;

use Robo\TaskAccessor;

trait LoadAllTasks {

  use TaskAccessor;

  use \Robo\Collection\loadTasks;

  use \RoboGary\Robo\Task\Lando\loadTasks;
  use \RoboGary\Robo\Task\Bitbucket\loadTasks;
}
