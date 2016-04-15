<?php
class Registry
{
    private static $config = [];

    public static function setConfig($key, $value)
    {
        self::$config[$key] = $value;
    }

    public static function getConfig($key)
    {
        return self::$config[$key];
    }
}