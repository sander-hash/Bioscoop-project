<?php
$user="sjoerd";
$pass="MyNewPass4!";
try {
    $db = new PDO('mysql:host=db;dbname=bioscoop', $user, $pass);
} catch (PDOException $e) {
    error_log($e->getMessage(), 3, "error_log.txt");
    die('Er is een probleem met de database verbinding');
    
    
}
?>