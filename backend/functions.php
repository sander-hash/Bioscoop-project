<?php
    function showOneFilm(){
      require ('db.php');
      $id = $_GET['id'];
      $query = "SELECT * FROM films WHERE id = $id";
      $stmt = $db->query($query);
      return $stmt;
  }
    function showListData(){
    require ('db.php');
    $query = "SELECT * FROM films";
    $stmt = $db->query($query);
    return $stmt;
  }  

  function showMovie(){
    require ('db.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM films where id = $id";
    $stmt = $db->query($query);
    return $stmt; 
    
  }

?>