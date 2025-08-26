<?php

namespace Engine\Services;

abstract class AbstractProvider
{
    public function __construct(
        protected $di,
    ){}

    abstract function init();
}