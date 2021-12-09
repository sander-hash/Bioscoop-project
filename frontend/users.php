<?php 

$id = "";
$username = "";
$password = "";
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
<body>
    <?php 
    require ('../backend/userController.php');
    $lc = new userController();
    $lc->showUsers();
    ?>
    <?php 
    if(isset($_GET['id']) && $_GET['action'] === 'delete'){
        $lc = new userController();
        $lc->deleteUser($id, $username, $password);
        }
        ?>
</body>
</html>