<?php

use IShow\App;

require_once dirname(__DIR__) . './config/init.php';

new App();

throw new Exception('Страница не найдена', 500);
