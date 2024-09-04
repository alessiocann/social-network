<?php

session_start();

if(!isset($_SESSION["nomeUtente"]))
{
    header("Location: login.php");
    exit;
}
?>





<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FAR MUSIC</title>
        <script src='home.js' defer></script>
        <link rel='stylesheet' href='home.css'>
        <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1 id='far'>FAR</h1>
            <h1 id='music'>MUSIC</h1>   
        </header>  
        
        <nav>
                
                    <a href="home.php">Home </a>
                    <a href="search_people.php">Cerca utente </a>
                    <a href="create_post.php">Cerca post </a>
                    <a href="logout.php">Logout </a>
                
        </nav>
        
        <div id = 'boxPosts'>
        </div>
        
        <section id="modalView" class="hidden">
        </section> 

    </body>

</html>