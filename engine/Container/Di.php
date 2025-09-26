<?php

namespace Engine\Container;

use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Di implements ContainerInterface
{
    private array $services = [];

    /**
     * @param string $key
     * @param mixed $value
     * 
     * @return void
     */
    public function set(string $key, $value):void
    {
        $this->services[$key] = $value;
    }

    /**
     * @param mixed $key
     * 
     * @return mixed
     */
    public function get($key): mixed
    {
        if (!$this->has($key)) {
            throw new class("Service {$key} not found") extends \Exception implements NotFoundExceptionInterface {};
        }

        return $this->services[$key];
    }

    /**
     * @param mixed $key
     * 
     * @return bool
     */
    public function has($key):bool
    {
        return isset($this->services[$key]);
    }
}