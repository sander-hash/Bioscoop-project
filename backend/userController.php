<?php
class userController{
    private $db;
    public function __construct(){
        require('db.php');
        $this->db=$db;
    }
    public function showUsers(){
        $query = "SELECT * FROM login";
        $data = $this->db->query($query);

        echo '<table width="70%" border="1" cellpadding="10" cellspacing="10">
        <tr>
        <th>Userid</th>
        <th>Username</th>
        <tr>';

        foreach ($data as $row)
        {
            echo '<tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["username"].'</td>
            <td><a href="?id=' . $row['id'] . '&action=delete"><div style="color:red">Delete</div></a></td>
            </tr>';
            
      
       }
        
      echo '</table>';
      return $data;
      }


      public function deleteUser(){
        $id = $_GET['id'];
        $query = "DELETE FROM login where id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if($stmt == true){
          echo "Artikel is verwijderd <br>";
        }
      }  
} 

?>