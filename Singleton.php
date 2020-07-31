<?php

final class Singleton
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): Singleton
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}

$singletonObject = Singleton::getInstance();
$singletonObject1 = Singleton::getInstance();
var_dump($singletonObject);
var_dump($singletonObject1);

final class Configuration
{
    private static $instance;
    private $config = [];

    private function __construct()
    {
    }

    public static function getInstance(): Configuration
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function getConfig($key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    public function setConfig($key, $value)
    {
        $this->config[$key] = $value;
        return $this;
    }
}

$config = Configuration::getInstance();
$config
    ->setConfig('user', 1)
    ->setConfig('is_admin', false)
    ->setConfig('last_login', time());
var_dump($config);