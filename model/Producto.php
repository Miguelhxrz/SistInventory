<?php 

class Producto {

  private $name;
  private $price;
  private $cantidad;

   #database
   private $db;
  
   #constructor
   function __construct() {
    $this->db= new db_connect();
   }
   
   #set
   function setName($name) {
    $this->name = $name;
  }

  function setPrice($price) {
    $this->price = $price;
  }

  function setCantidad($cantidad) {
    $this->cantidad = $cantidad;
  }

  #get
  function getName($name) {
    $this->name = $name;
  }

  function getPrice($price) {
    $this->price = $price;
  }

  function getCantidad($cantidad) {
    $this->cantidad = $cantidad;
  }

  #sentencias
  function addproducto() {

    $query = "INSERT INTO `producto`(`nombre`, `precio`, `cantidad`) VALUES ('".$this->name."','".$this->price."','".$this->cantidad."')";

    $send = $this->db->sendQuery($query);

    if(isset( $send )) {
      return 1;
    }else {
      return 0;
    }
  }

  function showproducto () {

      $query = "SELECT * FROM `producto`";
  
      $send = $this->db->sendQuery($query);
  
      $products = array();
  
      if(mysqli_num_rows($send) > 0) {
  
        while($rows =  mysqli_fetch_assoc($send)) {
          array_push($products,$rows);
        }
  
        return $products;
  
      }else {
        return 0;
      }




  }



}



?>