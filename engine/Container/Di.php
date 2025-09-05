<?php

namespace Engine\Container;

use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Di implements ContainerInterface
{
    private array $services = [];

    public function set(string $key, $value):void
    {
        $this->services[$key] = $value;
    }

    public function get($key): mixed
    {
        if (!$this->has($key)) {
            throw new class("Service {$key} not found") extends \Exception implements NotFoundExceptionInterface {};
        }

        return $this->services[$key];
    }

    public function has($key):bool
    {
        return isset($this->services[$key]);
    }
}