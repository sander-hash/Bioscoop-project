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
          $plaatje = $_POST['plaatje'];
          $hoofdrolspeler = $_POST['hoofdrolspeler'];
          $achtergrondhoofdrolspeler = $_POST['achtergrondhoofdrolspeler'];
        
        
          if(empty($film) || empty($begintijd) || empty($eindtijd) || empty($description) || empty($locatie) || empty($prijs) || empty($plaatje) || empty($hoofdrolspeler) || empty($achtergrondhoofdrolspeler)) {
            $status = "All fields are compulsory.";
          } else {
            if(strlen($film) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $film)) {
              $status = "Please enter a valid name";
            } else {
        
              $sql = "INSERT INTO films (film, description, begintijd, eindtijd, locatie, prijs, plaatje, hoofdrolspeler, achtergrondhoofdrolspeler) VALUES (:film, :description, :begintijd, :eindtijd, :locatie, :prijs, :plaatje, :hoofdrolspeler, :achtergrondhoofdrolspeler)";
        
              $stmt = $db->prepare($sql);
              
              $stmt->execute(['film' => $film, 'description' => $description, 'begintijd' => $begintijd, 'eindtijd' => $eindtijd, 'locatie' => $locatie, 'prijs' => $prijs, 'plaatje' => $plaatje, 'hoofdrolspeler' => $hoofdrolspeler, 'achtergrondhoofdrolspeler' => $achtergrondhoofdrolspeler]);
        
              
              $film = "";
              $description = "";
              $begintijd = "";
              $eindtijd = "";
              $locatie = "";
              $prijs = "";
              $plaatje = "";
              $hoofdrolspeler = "";
              $achtergrondhoofdrolspeler = "";
              


         
            }
          
              
            }
          }
        
        }
      

       
    

    function showList(){
        try{
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
        <th>plaatje</th>
        <th>hoofdrolspeler</th>
        <th>achtergrondhoofdrolspeler</th>
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
            <td>'.$row["plaatje"].'</td>
            <td>'.$row["hoofdrolspeler"].'</td>
            <td>'.$row["achtergrondhoofdrolspeler"].'</td>
            <td><a href="?id=' . $row['id'] . '&action=edit"><div style="color:green">Edit</div></a></td>
            <td><a href="?id=' . $row['id'] . '&action=delete"><div style="color:red">Delete</div></a></td>
            </tr>';
            

       }
        }catch(Exception $e){
          error_log($_SESSION, 3, "app_errors.log");
          die("There was a problem");
        }
echo '</table>';
return $data;
    }
    function deleteItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs, $plaatje, $hoofdrolspeler, $achtergrondhoofdrolspeler){
        include 'db.php';
        $id = $_GET['id'];
        $query = "DELETE FROM films where id = $id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        if($stmt == true){
          echo "Artikel is verwijderd <br>";
        }
        
    }

    function updateItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs, $plaatje, $hoofdrolspeler, $achtergrondhoofdrolspeler)
    {
        include 'db.php';
        $query = "UPDATE films SET film='$film', description='$description', begintijd='$begintijd', eindtijd='$eindtijd', locatie='$locatie', prijs='$prijs', plaatje='$plaatje', hoofdrolspeler='$hoofdrolspeler', achtergrondhoofdrolspeler='$achtergrondhoofdrolspeler' where id ='$id'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        var_dump($stmt);
        if($stmt == true){
          echo "Artikel is geupdate <br>";
        }else{
            echo" er is een error";
        }
        
    }
 
    
    function showUpdateItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs, $plaatje, $hoofdrolspeler, $achtergrondhoofdrolspeler, $row){
      include 'db.php';
      $update = true;
       $id = $_GET['id'];
       $film = $row['film'];
       $description = $row['description'];
       $begintijd = $row['begintijd'];
       $eindtijd = $row['eindtijd'];
       $locatie = $row['locatie'];
       $prijs = $row['prijs'];
       $plaatje = $row['plaatje'];
       $hoofdrolspeler = $row['hoofdrolspeler'];
       $achtergrondhoofdrolspeler = $row['achtergrondhoofdrolspeler'];
         $query = $db>query("SELECT * FROM films WHERE id=$id");
         $row = $query->fetch();
         
    }

    function showListData(){
        include 'db.php';
        $query = "SELECT * FROM films";
        $stmt = $stmt->query($query);
        return $stmt;
    }

    function showItemsIndex(){
        
        $item = showListData();
      foreach ($item as $row){
        echo '
        
        <div class="xl:w-1/4 md:w-1/2 p-4">
        <a href="film1.php?id='.$row['id'].'">
        <div class="bg-gray-100 p-6 rounded-lg">
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="'.$row['plaatje'].'" alt="content">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">'.$row['film'].'</h2>
          <p class="leading-relaxed h-20">'.$row['description'].'</p>
        </div>
      </div>
    
  
        ';

      }


    }




    function showOneFilm(){
        include 'db.php';
        $id = $_GET['id'];
        $query = "SELECT film, description, begintijd, eindtijd, locatie, prijs, plaatje, hoofdrolspeler, achtergrondhoofdrolspeler FROM films WHERE id = $id";
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
        <img alt="content" class="object-cover object-center h-full w-full" src="'.$row['plaatje'].'">
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
            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">'.$row["hoofdrolspeler"].'</h2>
            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
            <p class="text-base">'.$row["achtergrondhoofdrolspeler"].'</p>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <p class="leading-relaxed text-lg mb-4">'.$row["description"].'</p><br><br><br><br>
          
          Begintijd: '.$row["begintijd"].'<br>
          Eindtijd: '.$row["eindtijd"].'<br>
          Locatie: '.$row["locatie"].'<br>
          Prijs: €'.$row["prijs"].'

              
            
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