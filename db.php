<?php
$user="root";
$pass="";
try {
    $db = new PDO('mysql:host=localhost;dbname=bioscoop', $user, $pass);
} catch (PDOException $e) {
    error_log($e->getMessage(), 3, "error_log.txt");
    die('Er is een probleem met de database verbinding');
    
    
}
?>