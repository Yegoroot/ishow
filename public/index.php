<?php

use IShow\App;

require_once dirname(__DIR__) . './config/init.php';

new App();
var_dump(App::$app->getProperties());
