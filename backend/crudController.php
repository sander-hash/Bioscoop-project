<?php
class crudController{
    private $db;
    public function __construct(){
        require('db.php');
        $this->db=$db;
    }
    public function productInvoeren(){
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
      
            $stmt = $this->db->prepare($sql);
            
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
    
      public function deleteItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs, $plaatje, $hoofdrolspeler, $achtergrondhoofdrolspeler){ 
        $id = $_GET['id'];
        $query = "DELETE FROM films where id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if($stmt == true){
          echo "Artikel is verwijderd <br>";
        }
        
    }
    
    public function updateItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs, $plaatje, $hoofdrolspeler, $achtergrondhoofdrolspeler)
    {
        $query = "UPDATE films SET film='$film', description='$description', begintijd='$begintijd', eindtijd='$eindtijd', locatie='$locatie', prijs='$prijs', plaatje='$plaatje', hoofdrolspeler='$hoofdrolspeler', achtergrondhoofdrolspeler='$achtergrondhoofdrolspeler' where id ='$id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        var_dump($stmt);
        if($stmt == true){
          echo "Artikel is geupdate <br>";
        }else{
            echo" er is een error";
        }
        
    }
    
    public function showList(){
      $query = "SELECT * FROM films";
      $data = $this->db->query($query);
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
      
    echo '</table>';
    return $data;
    }
    
    
    }
    ?>