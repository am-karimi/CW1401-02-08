<?php

namespace Classes;

use  Classes\DatabaseConnectionInterface;
// use Classes\PDO;
// use Classes\PDOException;

class MySqlDatabaseConnection  implements DatabaseConnectionInterface
{
    protected  $objConnection;
    protected  static $instance = null;
    protected  $serverName = "127.0.0.1";
    protected  $userName = "root";
    protected  $password = "";
    protected  $dbname = "maktab";


    private  function __construct()
    {
        $this->objConnection = new \PDO("mysql:host=" . $this->serverName . ";dbname=" .
            $this->dbname, $this->userName, $this->password);
    }



    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new static();
        }
        return self::$instance;
    }
    public  function getConnection(): \PDO
    {
        return $this->objConnection;
    }
}
