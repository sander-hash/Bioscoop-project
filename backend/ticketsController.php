<?php
class ticketsController{
    private $db;
    public function __construct(){
        require('db.php');
        $this->db=$db;
    }
    public function ticket($email, $voornaam, $achternaam, $kaartjes, $stoelkeuze, $id){
        $query = "INSERT INTO kaartje (email, voornaam, achternaam, kaartjes, stoelkeuze, id) VALUES (:email, :voornaam, :achternaam, :kaartjes, :stoelkeuze, :id)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email' => $email, 'voornaam' => $voornaam, 'achternaam' => $achternaam, 'kaartjes' => $kaartjes, 'stoelkeuze' => $stoelkeuze , 'id' => $id]);
        }

    


    public function showTickets(){
        $query = "SELECT * FROM kaartje";
        $data = $this->db->query($query);


        echo '<table width="70%" border="1" cellpadding="10" cellspacing="10">
        <tr>
        <th>Email</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Aantal kaartjes</th>
        <th>Stoelkeuze</th>
        <tr>';

        foreach ($data as $row)
        {
            echo '<tr>
            <td>'.$row["email"].'</td>
            <td>'.$row["voornaam"].'</td>
            <td>'.$row["achternaam"].'</td>
            <td>'.$row["kaartjes"].'</td>
            <td>'.$row["stoelkeuze"].'</td>
            <td><a href="?id=' . $row['id'] . '&action=delete"><div style="color:red">Delete</div></a></td>
            </tr>';
            
      
       }
        
      echo '</table>';
      return $data;
      }

      public function klantShowTickets(){
        $id = $_GET['id'];
        $query = "SELECT * FROM kaartje where id = $id";
        $data = $this->db->query($query);


        echo '<table width="70%" border="1" cellpadding="10" cellspacing="10">
        <tr>
        <th>Email</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Aantal kaartjes</th>
        <th>Stoelkeuze</th>
        <tr>';

        foreach ($data as $row)
        {
            echo '<tr>
            <td>'.$row["email"].'</td>
            <td>'.$row["voornaam"].'</td>
            <td>'.$row["achternaam"].'</td>
            <td>'.$row["kaartjes"].'</td>
            <td>'.$row["stoelkeuze"].'</td>
            </tr>';
            
      
       }
        
      echo '</table>';
      return $data;
      }


      public function deleteTicket(){
        $id = $_GET['id'];
        $query = "DELETE FROM kaartje where id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

      }  

    }

?>