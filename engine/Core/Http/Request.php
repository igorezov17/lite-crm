<?php

namespace Engine\Core\Http;

class Request
{
    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $cookie,
        public readonly array $files,
        public readonly array $server
    )
    {}

    public static function createFromGlobals():static
    {
        return new static(
            $_GET, 
            $_POST, 
            $_COOKIE, 
            $_FILES, 
            $_SERVER
        );
    }

    public function getUrl()
    {
        return strtok($this->server['REQUEST_URI'], '?') ;
    }

    public function getMethod()
    {
        return $this->server['REQUEST_METHOD'];
    }
}