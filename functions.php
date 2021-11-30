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



?>