<?php 
require_once('../model/db_connect.php');

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



}



?>