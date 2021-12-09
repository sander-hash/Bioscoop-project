
<?php include_once("navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="flex-col h-screen justify-between">


<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap w-full mb-20">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Al onze films</h1>
        <div class="h-1 w-20 bg-indigo-500 rounded"></div>
      </div>
      <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Hier staan alle films die wij tonen in de bioscoop.</p>
    </div>
    <div class="flex flex-wrap -m-4">
    <?php   
    require ('../backend/showMoviesController.php');
    $lc = new showMoviesController();
    $lc -> showItemsIndex();
    ?>
    
</section>

</body>
</html>

<?php require_once('footer.php');?>