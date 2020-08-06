<?php

namespace IShow;

trait TSingletone
{
    private static $instance;

    /**
     * если есть объект то вернем, если нет то положем его и вернем
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
