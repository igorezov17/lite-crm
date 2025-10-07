<?php

namespace Engine;

use Engine\Container\Di;
use stdClass;

class Load
{
    private const ENTITY_NAMESPACE      = 'App\Models\%s\%s';
    private const REPOSITORY_NAMESPACE  = 'App\Models\%s\%sRepository';

    public function __construct(private $di)
    {}

    public function model(string $modelName, string $modelDir = ''): stdClass
    {
        $model      = new \stdClass();
        $modelName  = ucfirst($modelName);
        $modelDir   = ucfirst($modelDir ? $modelDir : $modelName);

        $entity     = sprintf(self::ENTITY_NAMESPACE, $modelDir, $modelName);
        $repository = sprintf(self::REPOSITORY_NAMESPACE, $modelDir, $modelName); 

        $model->entity      = $entity;
        $model->repository  = new $repository($this->di);

        return $model;
    }
}