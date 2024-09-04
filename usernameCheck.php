
<?php

      
      $conn = mysqli_connect("151.97.9.184", "cannata_alessio", "6812362437", "cannata_alessio");
      
      $utenti = array();
      
      $res = mysqli_query($conn, "SELECT * FROM utente");
      while($row = mysqli_fetch_assoc($res))
      {
            $utenti[] = $row;
      }
      
      mysqli_free_result($res);
      mysqli_close($conn);
      
      echo json_encode($utenti);

?>