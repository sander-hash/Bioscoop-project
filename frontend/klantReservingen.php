<?php
require_once ('navbar.php');
require ('../backend/crudController.php');
if ($_SESSION['klantLogin'] == 'true'){

}else{
    header("Location:login.php");
}

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
    $lc->klantShowTickets();
    ?>