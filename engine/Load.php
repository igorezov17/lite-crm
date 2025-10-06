<?php

namespace Engine;

use stdClass;

class Load
{
    private const ENTITY_NAMESPACE      = 'App\Models\%s\%s';
    private const REPOSITORY_NAMESPACE  = 'App\Models\%s\%sRepository';

    public function model(string $modelName, string $modelDir = ''): stdClass
    {
        global $di;

        $model      = new \stdClass();
        $modelName  = ucfirst($modelName);
        $modelDir   = ucfirst($modelDir ? $modelDir : $modelName);

        $entity     = sprintf(self::ENTITY_NAMESPACE, $modelDir, $modelName);
        $repository = sprintf(self::REPOSITORY_NAMESPACE, $modelDir, $modelName); 

        $model->entity      = $entity;
        $model->repository  = new $repository($di);

        return $model;
    }
}