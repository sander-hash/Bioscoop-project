<?php
class registerController{
    private $db;
    public function __construct(){
        require('db.php');
        $this->db=$db;
    }
    public function register($username, $password){
        $query = "SELECT * FROM login WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);
        $result = $stmt->rowCount();
        if($result > 0){
            echo "Deze usernaam bestaat al";
    
        }else{
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO login(username, password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['username' => $username, 'password' => $password]);
        header("Location:/Bp-Project-Bioscoop/index.php");
        
        }

    }
}




?>