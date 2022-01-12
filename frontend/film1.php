
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Bioscoop</title>
</head>
<?php include_once("navbar.php"); ?>

<body class="flex-col h-screen justify-between">

<?php
require ('../backend/showMoviesController.php');
$lc = new showMoviesController();
$lc->showItemFilm();
?>
    

    


</body>
</html>

<?php require_once('footer.php');