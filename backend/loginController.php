<?php
class LoginController{
  private $db;
  public function __construct(){
    require ('db.php');
    $this->db = $db;
  }
  public function login($username, $password){

    
        $query = "SELECT * FROM login WHERE username = :user";
    
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':user',$username);
        if($stmt->execute()){
          $login = $stmt->fetch(PDO::FETCH_OBJ);

          if(password_verify($password, $login->password)){
            header("Location:/Bp-Project-Bioscoop/frontend/index.php");
          }else{
            echo "het wachtwoord is fout";
          }
        } else {
          echo "Er is iets misgegaan met het uitvoeren van de query";
        }
      }
    
  public function uitloggen(){
        
        if (isset($_POST['destroySession'])){
            session_destroy();
            header("Location:/Bp-Project-Bioscoop/frontend/login.php");
            
        }
        }
      }

?>