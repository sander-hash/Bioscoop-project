<?php include('functions.php'); ?>
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
<body>

<?php showItemFilm(); ?>
    
<button onclick="window.location.href='betalenfilm1'" class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Bestel kaartjes</button>
    

</body>
</html>