<?php
session_start();
if(!isset($_SESSION["nomeUtente"]))
{
    header("Location: login.php");
    session_destroy();
    exit;
}


  $utenti = array();
  $post= $_GET['idPost'];
  $conn = mysqli_connect("151.97.9.184", "cannata_alessio", "6812362437", "cannata_alessio");
  $query = "SELECT likes.nomeUtente as nomeUtente, likes.postID as postID FROM likes WHERE likes.postID = $post";
  $res = mysqli_query($conn, $query);
  
  if(mysqli_num_rows($res) == 0){
    $utenti[] = [
      'nomeUtente' => 'Nessun like ricevuto',
      'idPost' => $post
    ];
      echo json_encode($utenti);
      //exit;   
  }
  else {
  while($row = mysqli_fetch_assoc($res))
        {
              $utenti[] = $row;
        }
        
        echo json_encode($utenti);
      }
?>