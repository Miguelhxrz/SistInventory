<?php 

class User {

  private $id;
  private $username;
  private $password;

   #database
   private $db;
  
   #constructor
   function __construct() {
    $this->db= new db_connect();
   }


  function VerifyUserDb( $username ) {

    $query = "SELECT `username` FROM `users` WHERE `username` = '".$username."'";

    $send = $this->db->sendQuery($query);

    $users = array();

    if(mysqli_num_rows($send) > 0) {

      while($rows =  mysqli_fetch_array($send)) {
        array_push($users,$rows);
      }

      return count($users);

    }else {
      return 0;
    }

  }

  function VerifyPasswordDb( $password ) {

    $query = "SELECT `password` FROM `users` WHERE `password` = '".$password."'";

    $send = $this->db->sendQuery($query);

    $pass = array();

    if(mysqli_num_rows($send) > 0) {

      while($rows =  mysqli_fetch_array($send)) {
        array_push($pass,$rows);
      }

      return count($pass);

    }else {
      return 0;
    }

  }


  function Login( $username, $password ) {

    $check_username = $this->VerifyUserDb( $username );
    $check_password = $this->VerifyPasswordDb( $password );

    if( $check_username === 1 && $check_password === 1 ) {

      return 1;

    }else if( $check_username === 1 && $check_password === 0 ) {

      return "ERROR: Contraseña erronea";

    }else if( $check_username === 0 && $check_password === 1 ) {

      return "ERROR: Username erroneo";

    }else if( $check_username === 0 && $check_password === 0 ) {

      return "ERROR: Username y password erroneos";

    }

  }


  function GetUsername () {

      $query = "SELECT `username` FROM `users`";
  
      $send = $this->db->sendQuery($query);
  
      $users = '';
  
      if(mysqli_num_rows($send) > 0) {
  
        while($rows =  mysqli_fetch_assoc($send)) {
          $users = $rows['username'];
        }
  
        return $users;
  
      }else {
        return 0;
      }
  

  }














}






?>