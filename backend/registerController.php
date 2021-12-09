<?php
class registerController{
    private $db;
    public function __construct(){
        require ('db.php');
        $this->db = $db;
    }
    public function register($username, $password){
        
        
            $sql = "INSERT INTO login (username, password) VALUES (:username, :password)";
            $password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['username' => $username, 'password' => $password]);

      
        }

    }






?>