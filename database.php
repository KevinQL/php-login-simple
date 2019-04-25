<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_login_database';

try {
  /*
    * La variables conn es la que guarda la conexion con una base de datos
    * 
  */
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  /*
    * En caso de que No exista una base de datos, se crea rá un erro y la función die 
      matará todo el proceso...
  */
  die('Connection Failed: ' . $e->getMessage() . "{$username}");
}

?>
