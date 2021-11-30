<?php

function login(){
    include 'db.php';
if (isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE username = :user AND password = :pass";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':user',$username);
    $stmt->bindParam(':pass',$password);
    $stmt->execute();
    $login = $stmt->fetch(PDO::FETCH_OBJ);
    if ($login !=null){
        $_SESSION['isingelogd'] = true;
        header("Location:index.php");
    }else{
        echo "Login is niet correct";
    }
}
}

function sessionDestroy(){
    if (isset($_POST['destroySession'])){
        session_destroy();
        header("Location:login.php");
        
    }
    }




    function productInvoeren(){
        include 'db.php';

        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          $film = $_POST['film'];
          $description = $_POST['description'];
          $begintijd = $_POST['begintijd'];
          $eindtijd = $_POST['eindtijd'];
          $locatie = $_POST['locatie'];
          $prijs = $_POST['prijs'];
        
        
          if(empty($film) || empty($begintijd) || empty($eindtijd) || empty($description) || empty($locatie) || empty($prijs)) {
            $status = "All fields are compulsory.";
          } else {
            if(strlen($film) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $film)) {
              $status = "Please enter a valid name";
            } else {
        
              $sql = "INSERT INTO films (film, description, begintijd, eindtijd, locatie, prijs) VALUES (:film, :description, :begintijd, :eindtijd, :locatie, :prijs)";
        
              $stmt = $db->prepare($sql);
              
              $stmt->execute(['film' => $film, 'description' => $description, 'begintijd' => $begintijd, 'eindtijd' => $eindtijd, 'locatie' => $locatie, 'prijs' => $prijs]);
        
              
              $film = "";
              $description = "";
              $begintijd = "";
              $eindtijd = "";
              $locatie = "";
              $prijs = "";
              


         
            }
          }
        
        }

       
    }

    function showList(){
        include 'db.php';
        $query = "SELECT * FROM films";
        $data = $db->query($query);
        echo '<table width="70%" border="1" cellpadding="10" cellspacing="10">
        <tr>
        <th>Productnaam</th>
        <th>description</th>
        <th>begintijd</th>
        <th>eindtijd</th>
        <th>locatie</th>
        <th>prijs</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>';


        foreach ($data as $row)
        {
            echo '<tr>
            <td>'.$row["film"].'</td>
            <td>'.$row["description"].'</td>
            <td>'.$row["begintijd"].'</td>
            <td>'.$row["eindtijd"].'</td>
            <td>'.$row["locatie"].'</td>
            <td>'.$row["prijs"].'</td>
            <td><a href="?id=' . $row['id'] . '&action=edit"><div style="color:green">Edit</div></a></td>
            <td><a href="?id=' . $row['id'] . '&action=delete"><div style="color:red">Delete</div></a></td>
            </tr>';
            

}

echo '</table>';
return $data;
    }
    function deleteItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs){
        include 'db.php';
        $id = $_GET['id'];
        $query = "DELETE FROM films where id = $id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        if($stmt == true){
          echo "Artikel is verwijderd <br>";
        }
        
    }

    function updateItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs)
    {
        include 'db.php';
        $query = "UPDATE films SET film='$film', description='$description', begintijd='$begintijd', eindtijd='$eindtijd', prijs=$prijs where id ='$id'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        var_dump($stmt);
        if($stmt == true){
          echo "Artikel is geupdate <br>";
        }
        
    }
 
    
    function showUpdateItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs, $row){
      include 'db.php';
      $update = true;
       $id = $_GET['id'];
       $film = $row['film'];
       $description = $row['description'];
       $begintijd = $row['begintijd'];
       $eindtijd = $row['eindtijd'];
       $locatie = $row['locatie'];
       $prijs = $row['prijs'];
         $query = $db>query("SELECT * FROM films WHERE id=$id");
         $row = $query->fetch();
         
    }

    function showListData(){
        include 'db.php';
        $query = "SELECT * FROM films";
        $stmt = $db->query($query);
        return $stmt;
    }

    function showItemsIndex(){
        
        $item = showListData();
      foreach ($item as $row){
        echo '
        <div class="bg-gray-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-16 lg:max-w-none">
      <h2 class="text-2xl font-extrabold text-gray-900">Films</h2>

      <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
        <div class="group relative">
          <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
            <img src="https://media.pathe.nl/nocropthumb/275x450/gfx_content/Free-Guy_ps_1_jpg_sd-low_Copyright-2020-Twentieth-Century-Fox-Film-Corporation-All-Rights-Reserved.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="w-full h-full object-center object-cover">
          </div>
          <h3 class="mt-6 text-sm text-gray-500">
            <a href="film1.php?id='.$row['id'].'">
           
              <span class="absolute inset-0"></span>
              '.$row["film"].'
            </a>
          </h3>
          <p class="text-base font-semibold text-gray-900">'.$row["description"].'</p>
          
        </div>
        
       
    </div>
  </div>
</div>
        ';

      }


    }




    function showOneFilm(){
        include 'db.php';
        $id = $_GET['id'];
        $query = "SELECT film, description, begintijd, eindtijd, locatie, prijs FROM films WHERE id = $id";
        $stmt = $db->query($query);
        return $stmt;
    }


    function showItemFilm(){
        $item = showOneFilm();
        foreach ($item as $row){

        echo '
        <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto flex flex-col">
        <div class="lg:w-4/6 mx-auto">
        <div class="rounded-lg h-100 overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="https://www.moviemeter.nl/afbeeldingen/artikel/1920x1080/ryan-reynolds-komt-met-groot-nieuws-na-succes-free-guy-disney-wil-nu-al-een-vervolg-32531629113153.jpg">
        </div>
        <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
          <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">Hoofdrolspeler</h2>
            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
            <p class="text-base">Achtergrond van hoofdrolspeler.</p>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <p class="leading-relaxed text-lg mb-4">'.$row["description"].'</p>
          <a class="text-indigo-500 inline-flex items-center">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
              
              
            </svg>
          </a>
        </div>
        </div>
        </div>
        </div>
        </section>
        
        
        ';

      }
    }
    


    


?>