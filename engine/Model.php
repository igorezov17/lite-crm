<?php

namespace Engine;

use Engine\Container\Di;
use Engine\Core\Database\DBQuery;
use Engine\Core\Database\QueryBuilder;

abstract class Model
{
    protected DBQuery $db;

    protected QueryBuilder $queryBuilder;

    protected Load $load;

    public function __construct(
        protected Di $di,
    )
    {
        $this->db           = $this->di->get('db');
        $this->load         = $this->di->get('load');
        $this->queryBuilder = new QueryBuilder();
    }
}