<?php

namespace Engine\Di;

class Di
{
    private array $container = [];

    public function set(string $key, $value):void
    {
        $this->container[$key] = $value;
    }

    public function get($key): ?string
    {
        return $this->container[$key];
    }
}