<?php

namespace IShow;

class App
{
    /**
     * контейнер для всяких штук
     * по шаблону проектирования реестр
     */
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/'); // обрезаем концевой слеш
        // session_start(); // start session
        /**
         * записываем в контейнер app - объект нашего реестра
         */
        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();
    }

    protected function getParams()
    {
        $params = require_once CONF . '/params.php';
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}
