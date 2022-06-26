<?php 

class db_connect {

  var $conn;

  function __construct(){
    $server_connect = 'localhost';
    $username = 'root';
    $password = ''; #<- cambiar la contraseña
    $db = 'sistinventory';

    $this->conn = new mysqli($server_connect, $username, $password, $db);

    if($this->conn->connect_errno) {
      echo "<h3>Hubo un error con la conexion de la base de datos, intentelo nuevamente</h3>";
      exit;
    }

  }

  function sendQuery($query) {
    return $this->conn->query($query);
  }


}















?>