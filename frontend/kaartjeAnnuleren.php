<?php
require_once('navbar.php');
if ($_SESSION['isingelogd'] == true){

}else{
    header("Location:/Bp-Project-Bioscoop/index.php");
}

$id = "";
$email = "";
$voornaam = "";
$achternaam = "";
$stoelkeuze = "";
$kaartjes = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="flex-col h-screen">
    <?php 
    require ('../backend/ticketsController.php');
    $lc = new ticketsController();
    $lc->showTickets();
    ?>
    <?php 
    if(isset($_GET['id']) && $_GET['action'] === 'delete'){
        $lc = new ticketsController();
        $lc->deleteTicket($id, $email, $voornaam, $achternaam, $stoelkeuze, $kaartjes);
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Kaartje geanulleerd!</strong>
        <span class="block sm:inline"> </span>
      </div>';
    }
        ?>
</body>
</html>
