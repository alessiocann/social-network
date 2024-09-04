<?php
session_start();
if(!isset($_SESSION["nomeUtente"]))
{
    header("Location: login.php");
    session_destroy();
    exit;
}

$conn = mysqli_connect("151.97.9.184", "cannata_alessio", "6812362437", "cannata_alessio");
$seguace = $_SESSION['nomeUtente'];
$seguito = $_GET['seguito'];
$inserimento  = "INSERT INTO follower(seguace, seguito) VALUES(\"$seguace\", \"$seguito\")";
$res = mysqli_query($conn, $inserimento);
if($res === false){
    echo "0";
    exit;
}
echo "1";

?>