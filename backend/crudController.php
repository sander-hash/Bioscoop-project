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
        $zaal = $_POST['zaal'];
      
      
        if(empty($film) || empty($begintijd) || empty($eindtijd) || empty($description) || empty($locatie) || empty($prijs) || empty($plaatje) || empty($hoofdrolspeler) || empty($achtergrondhoofdrolspeler) || empty($zaal)) {
          $status = "All fields are compulsory.";
        } else {
          if(strlen($film) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $film)) {
            $status = "Please enter a valid name";
          } else {
      
            $sql = "INSERT INTO films (film, description, begintijd, eindtijd, locatie, prijs, plaatje, hoofdrolspeler, achtergrondhoofdrolspeler, zaal) VALUES (:film, :description, :begintijd, :eindtijd, :locatie, :prijs, :plaatje, :hoofdrolspeler, :achtergrondhoofdrolspeler, :zaal)";
      
            $stmt = $this->db->prepare($sql);
            
            $stmt->execute(['film' => $film, 'description' => $description, 'begintijd' => $begintijd, 'eindtijd' => $eindtijd, 'locatie' => $locatie, 'prijs' => $prijs, 'plaatje' => $plaatje, 'hoofdrolspeler' => $hoofdrolspeler, 'achtergrondhoofdrolspeler' => $achtergrondhoofdrolspeler, 'zaal' => $zaal]);
            
            
            $film = "";
            $description = "";
            $begintijd = "";
            $eindtijd = "";
            $locatie = "";
            $prijs = "";
            $plaatje = "";
            $hoofdrolspeler = "";
            $achtergrondhoofdrolspeler = "";
            $zaal;

            echo '
                      <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>Film ingevoerd</p>
          </div>
          <br>
            ';
          
          }
          }
        }
      }
    
      public function deleteItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs, $plaatje, $hoofdrolspeler, $achtergrondhoofdrolspeler, $zaal){ 
        $id = $_GET['id'];
        $query = "DELETE FROM films where id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        echo '
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Film verwijderd</strong>
        <span class="block sm:inline">Film is verwijderd!</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>
<br>
        ';
        
    }
    
    public function updateItem($id, $film, $description, $begintijd, $eindtijd, $locatie, $prijs, $plaatje, $hoofdrolspeler, $achtergrondhoofdrolspeler, $zaal)
    {
        $query = "UPDATE films SET film='$film', description='$description', begintijd='$begintijd', eindtijd='$eindtijd', locatie='$locatie', prijs='$prijs', plaatje='$plaatje', hoofdrolspeler='$hoofdrolspeler', achtergrondhoofdrolspeler='$achtergrondhoofdrolspeler', zaal='$zaal' where id ='$id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        var_dump($stmt);
        echo 
        '
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
  <p>Film gewijzigd!</p>
</div>
<br>
        ';


        
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
      <th>zaal</th>
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
          <td>'.$row["zaal"].'</td>
          <td><a href="?id=' . $row['id'] . '&action=edit"><div style="color:green">Edit</div></a></td>
          <td><a href="?id=' . $row['id'] . '&action=delete"><div style="color:red">Delete</div></a></td>
          </tr>';
          
    
     }
      
    echo '</table>';
    return $data;
    }
    
    
    }
    ?>