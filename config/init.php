<?php

define('DEBUG', 1); // mode show error - development
define('ROOT', dirname(__DIR__)); // root directory
define('WWW', ROOT . '/public'); // indicate public directory
define('APP', ROOT . '/app'); // indicate app directory
define('CORE', ROOT . '/vendor/ishow/core');
define('LIBS', ROOT . '/vendor/ishow/libs');
define('CACHE', ROOT . '/temp/cache');
define('CONF', ROOT . '/config');
define('LAYOUT', 'default');

// http://ishow/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://ishow/public/
$app_path = preg_replace('#[^/]+$#', '', $app_path);
// http://ishow
$app_path = str_replace('/public/', '', $app_path);

define('PATH', $app_path);
define('ADMIN', PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';
