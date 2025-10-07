<?php

namespace Engine\Core\Database;

use \ReflectionClass;
use \ReflectionProperty;

trait ActiveRecord
{
    private $db;

    private $queryBuilder;

    public function __construct($id = 0)
    {
        global $di;

        $this->db = $di->get('db');
        $this->queryBuilder = new QueryBuilder($di);

        if ($id) {
            $this->setId($id);
        }
    }

    public function save()
    {
        $properties = $this->getIssetProperties();

        try {
            if (isset($this->id)) {
                $this->db->execute(
                    $this->queryBuilder->update($this->table)
                        ->set($properties)
                        ->where('id', $this->id)
                        ->sql(),
                    $this->queryBuilder->getParams()
                );
            } else {
                $this->db->execute(
                    $this->queryBuilder->insert($this->table)
                        ->set($properties)
                        ->sql(),
                    $this->queryBuilder->getParams()
                );
            }

        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    private function getIssetProperties()
    {
        $properties = [];
        foreach($this->getProperties() as $key => $property) {
            if (isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }
        return $properties; 
    }

    private function getProperties()
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PROTECTED);
        return $properties;
    }
}