<?php

namespace Engine\Di;

class Di
{
    private array $container = [];

    public function set(string $key, $value):void
    {
        $this->container[$key] = $value;
    }

    public function get($key): mixed
    {
        return $this->hasKey($key);
    }

    public function hasKey($key): mixed
    {
        return $this->container[$key] ?? false;
    }
}