<?php

namespace Classes;


interface DatabaseConnectionInterface
{
    public static function getInstance();
    public  function getConnection(): \PDO;
}
