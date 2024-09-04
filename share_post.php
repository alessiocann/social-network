<?php
    session_start();
    if(!isset($_SESSION["nomeUtente"]))
    {
        header("Location: login.php");
        session_destroy();
        exit;
    }
     
        else {
        $conn = mysqli_connect("151.97.9.184", "cannata_alessio", "6812362437", "cannata_alessio");
        $nomeUtente = $_SESSION['nomeUtente'];
        $url = $_GET['image'];
        $titolo= $_GET['titolo'];
        $datacorrente= date('Y-m-d H:i:s');
        $query = "INSERT INTO post (titolo, dataPost, URL, nomeUtente) VALUES (\"$titolo\",\"$datacorrente\",\"$url\",\"$nomeUtente\")";
        $res = mysqli_query($conn, $query);
        if($res === false){
           $testo = "Problema nella condivisione";
           echo "$testo";
           exit;
        }
        $testo = "Condiviso";
        echo "$testo";
    }
?>