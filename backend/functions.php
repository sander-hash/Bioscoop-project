<?php
    function showOneFilm(){
      require ('db.php');
      $id = $_GET['id'];
      $query = "SELECT film, description, begintijd, eindtijd, locatie, prijs, plaatje, hoofdrolspeler, achtergrondhoofdrolspeler FROM films WHERE id = $id";
      $stmt = $db->query($query);
      return $stmt;
  }
      
  
    function showListData(){
    require ('db.php');
    $query = "SELECT * FROM films";
    $stmt = $db->query($query);
    return $stmt;
  }  
?>