<?php
class LoginController{
  private $db;
  public function __construct(){
    require ('db.php');
    $this->db = $db;
  }
  public function login($username, $password){
    
        $query = "SELECT * FROM login WHERE username = :user AND password = :pass";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user',$username);
        $stmt->bindParam(':pass',$password);
        $stmt->execute();
        $login = $stmt->fetch(PDO::FETCH_OBJ);
        if ($login !=null){
            $_SESSION['isingelogd'] = true;
            header("Location:../index.php");
        }else{
          echo "Login failed";
        }
      }
  public function uitloggen(){
        
        if (isset($_POST['destroySession'])){
            session_destroy();
            header("Location:frontend/login.php");
            
        }
        }
      }

?>