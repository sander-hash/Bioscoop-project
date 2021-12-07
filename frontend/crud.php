<?php
require_once ('navbar.php');
require ('../backend/crudController.php');
if ($_SESSION['isingelogd'] == 'true'){

}else{
    header("Location:login.php");
}


$film = "";
$locatie = "";
$description = "";
$prijs = "";
$begintijd = "";
$eindtijd = "";
$plaatje = "";
$hoofdrolspeler = "";
$achtergrondhoofdrolspeler = "";
$id = '';
$update = false;
$updateItem = false;
$deleteItem = false;



if (isset($_POST['btnInvoer'])){

  $lc = new crudController();
  $lc->productInvoeren();
}
if(isset($_GET['id']) && $_GET['action'] === 'delete'){
    require ('../backend/db.php');
    $lc = new crudController();
    $lc->deleteItem($id, $film, $locatie, $description, $prijs, $begintijd, $eindtijd, $plaatje, $hoofdrolspeler, $achtergrondhoofdrolspeler);
    }
if (isset($_GET['id']) && $_GET['action'] === 'edit'){
   require '../backend/db.php';
   $update = true;
    $id = $_GET['id'];
    $query = $db->query("SELECT * FROM films WHERE id=$id");
    $row = $query->fetch();
    $film = $row['film'];
    $begintijd = $row['begintijd'];
    $eindtijd = $row['eindtijd'];
    $locatie = $row['locatie'];
    $description = $row['description'];
    $prijs = $row['prijs'];
    $plaatje = $row['plaatje'];
    $hoofdrolspeler = $row['hoofdrolspeler'];
    $achtergrondhoofdrolspeler = $row['achtergrondhoofdrolspeler'];
}
if(isset($_POST['btnUpdate'])){
    require ('../backend/db.php');
    $id = $_GET['id'];
    $film = $_POST['film'];
    $begintijd = $_POST['begintijd'];
    $eindtijd = $_POST['eindtijd'];
    $locatie = $_POST['locatie'];
    $description = $_POST['description'];
    $prijs = $_POST['prijs'];
    $plaatje = $_POST['plaatje'];
    $hoofdrolspeler = $_POST['hoofdrolspeler'];
    $achtergrondhoofdrolspeler = $_POST['achtergrondhoofdrolspeler'];
    $lc = new crudController();
    $lc->updateItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs, $plaatje, $hoofdrolspeler, $achtergrondhoofdrolspeler);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Contact Us</title>
</head>

<body>

<div class="container">
    <h1 class="text-2xl px-2 pb-4">Film invoeren</h1>

    <form action="" method="POST" class="w-full max-w-lg ">
        <input type="hidden" name="film" id="id"  value="<?php echo $id;?>">
        <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-5 mb-2 md:mb-0">
        <label for="film">Filmnaam</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="film" id="film" class="gt-input"
        placeholder="<?php echo $film; ?>">

      <div class="form-group">
        <label for="locatie">Description</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="description" id="description" class="gt-input"
        placeholder="<?php echo $description; ?>">
      </div>

      <div class="form-group">
        <label for="description">Begintijd</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="begintijd" id="begintijd" class="gt-input"
        placeholder="<?php echo $begintijd; ?>">
      </div>


      <div class="form-group">
        <label for="description">Eindtijd</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="eindtijd" id="eindtijd" class="gt-input"
        placeholder="<?php echo $eindtijd; ?>">
      </div>

      <div class="form-group">
        <label for="description">Locatie</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="locatie" id="locatie" class="gt-input"
        placeholder="<?php echo $locatie; ?>">
      </div>

      <div class="form-group">
        <label for="begintijd">Prijs</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="number" name="prijs" id="prijs" class="gt-input"
        placeholder="<?php echo $prijs; ?>">
      </div>

      <div class="form-group">
        <label for="description">Plaatje</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="plaatje" id="plaatje" class="gt-input"
        placeholder="<?php echo $plaatje; ?>">
      </div>

      <div class="form-group">
        <label for="description">Hoofdrolspeler</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="hoofdrolspeler" id="hoofdrolspeler" class="gt-input"
        placeholder="<?php echo $hoofdrolspeler; ?>">
      </div>

      <div class="form-group">
        <label for="description">Achtergrondhoofdrolspeler</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="achtergrondhoofdrolspeler" id="achtergrondhoofdrolspeler" class="gt-input"
        placeholder="<?php echo $hoofdrolspeler; ?>">
      </div>
</div>
</div>
      <?php if ($update ==true){ 
                echo '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full" input name="btnUpdate" type="submit" class="gt-button">Film updaten</button>';
      }else{
        echo '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full" input name="btnInvoer" type="submit" class="gt-button">Film invoeren</button>';
      }
      ?>

    <br>
    <br>
      
      <div class="form-status">
        

      </div>
    </form>
  </div>
  <br>
<?php
$lc = new crudController();
$lc->showList();
?>


</body>

</html>