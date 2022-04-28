<?php
require_once 'vendor/autoload.php';

use Classes\MySqlDatabaseConnection;

use Classes\MySqlDatabase;



$connection = MySqlDatabaseConnection::getInstance();
// $conn = ($connection->getConnection());
// $conn = $conn->prepare("SELECT * FROM students");
// var_dump($conn->execute());
// var_dump($conn->fetchAll());
// $connection = // an object of DatabaseConnectionInterface
//     $query1 = new MySqlDatabase($connection);
// $users = $query1->table('students')->select()->fetchAll(); // get all users
// var_dump($users);
// $query2 = new MySqlDatabase($connection);
// $user = $query2->table('users')->select()->where('id', 56)->fetch(); // get user by id = 56

$query3 = new MySqlDatabase($connection);
$newUser = ['Name' => 'mohammad', 'age' => 25];
var_dump($query3->table('students')->insert($newUser)->exec()); // this one should add a new row to table