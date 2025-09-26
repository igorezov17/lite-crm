<?php

namespace Engine\Core\Database;

/**
 * [Description QueryBuilder]
 */
class QueryBuilder
{
    /**
     * @var [type]
     */
    protected $sql;

    /**
     * @var [type]
     */
    protected $params;

    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param string $fileds
     * 
     * @return static
     */
    public function select(string $fileds = '*'):static
    {
        $this->reset();
        $this->sql['select'] = "SELECT {$fileds} ";

        return $this;
    }

    /**
     * @param mixed $table
     * 
     * @return self
     */
    public function from(string $table):static
    {
        $this->sql['from'] = "FROM {$table} ";

        return $this;
    }

    /**
     * @param string $column
     * @param mixed $value
     * @param string $operation
     * 
     * @return self
     */
    public function where(string $column, $values, string $operation = '='):static
    {
        if ($column) {
            $this->sql['where'][] = " {$column} {$operation} ?";
            $this->params[] = $values;
        }

        return $this;
    }

    /**
     * @param string $table
     * @param array $params
     * 
     * @return string
     */
    public function insert(string $table, array $params):string
    {
        $this->reset();
        $insert     = "INSERT INTO {$table} ";
        $columns    = '(';
        $values     = '(';
        if (!empty($params)) {
            foreach($params as $column => $value) {
                $this->params[] = $value;
                $columns .= "{$column}";
                $values  .= "?";
                if (next($params)) {
                    $columns    .= ', ';
                    $values     .= ', ';
                }
            }
            $columns .= ')';
            $values .= ')';
        }
        $insert .= "{$columns} VALUES {$values}";
        return $insert;
    }

    /**
     * @param string $type
     * 
     * @return static
     */
    public function orderBy(string $type):static
    {
        $this->sql['order_by'] = " ORDER BY {$type}";
        return $this;
    }

    /**
     * @param int $number
     * 
     * @return static
     */
    public function limit(int $number):static
    {
        $this->sql['limit'] = "LIMIT {$number}";
        return $this;
    }


    /**
     * @param string $table
     * @param array $values
     * 
     * @return static
     */
    public function update(string $table):static
    {
        $this->reset();
        $this->sql['update'] = "UPDATE {$table} ";
        return $this;
    }

    /**
     * @param array $values
     * 
     * @return static
     */
    public function set(array $values = []):static
    {
        $sql = ' SET ';
        if (!empty($values)) {
            foreach ($values as $column => $value) {
                $this->params[] = $value;
                $sql .= "{$column} = ?";
                if (next($values)) {
                    $sql .= ', ';
                }
            }
            $this->sql['set'] = $sql;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function sql():string
    {
        $sql = '';
        if (!empty($this->sql)) {
            foreach($this->sql as $key => $value) {
                
                if ($key == "where") {
                    $sql .= " WHERE ";
                    foreach($value as $where) {
                        $sql .= $where;
                        if (next($value)) {
                            $sql .= " AND ";
                        }
                    }
                } else {
                    $sql .= $value;
                }
            }
        }
        return $sql;
    }

    /**
     * @return void
     */
    private function reset():void
    {
        $this->sql      = [];
        $this->params   = [];
    }
}