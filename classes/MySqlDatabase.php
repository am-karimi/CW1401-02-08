<?php

namespace Classes;

use Classes\DatabaseInterface;

class MySqlDatabase  implements DatabaseInterface
{
    private $statment;
    protected $connection;
    protected $table;
    protected array $cols;
    protected  $sql;
    public function __construct(DatabaseConnectionInterface $connection)
    {
        $this->connection = $connection->getConnection();
    }
    public function insert(array $fields): DatabaseInterface
    {
        // $val = implode(',', array_values($fields));
        $var = array_values($fields);
        $var =  array_map(fn ($val) => "'$val'", $var);
        $var = implode(',', $var);

        $key = implode(',', array_keys($fields));
        $this->sql = "INSERT INTO $this->table ($key ) VALUES ($var) ";

        return $this;
    }
    public function table(string $table): DatabaseInterface
    {
        $this->table = $table;

        return $this;
    }
    public function select(array $cols = ['*']): DatabaseInterface
    {
        $cols = implode(', ', $cols);
        $this->sql = "select $cols from " . $this->table;

        return $this;
    }

    public function update(array $fields): DatabaseInterface
    {


        $this->sql = "UPDATE $this->table SET $fields";


        return $this;
    }
    public function where(string $val1, string $val2, string $operation = '='): DatabaseInterface
    {
        $this->sql = "SELECT $this->cols FROM $this->table  WHERE $val1 $operation $val2";

        return $this;
    }
    public function fetch()
    {
    }
    public function fetchAll()
    {
        $this->exec();
        return $this->statment->fetchAll();
    }
    public function exec()
    {
        $this->statment = $this->connection->prepare($this->sql);
        $this->statment->execute();
    }
}
