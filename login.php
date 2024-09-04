<?php

    
    session_start();
    
    if(isset($_SESSION["nomeUtente"]))
    {
        
        header("Location: home.php");
        exit;
    }
    
    if(isset($_POST["nomeUtente"]) && isset($_POST["password"]))
    {
        
        $conn = mysqli_connect("151.97.9.184", "cannata_alessio", "6812362437", "cannata_alessio");
        
        $query = "SELECT * FROM utente WHERE nomeUtente = '".$_POST['nomeUtente']."' AND password = '".$_POST['password']."'";
        $res = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($res) > 0)
        {
            
            $_SESSION["nomeUtente"] = $_POST["nomeUtente"];
            
            header("Location: home.php");
            exit;
        }
        else
        {
            $errore = true;
        }
    }

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FAR MUSIC</title>
        <script src='login.js' defer></script>
        <link rel='stylesheet' href='login.css'>
        <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1 id='far'>FAR</h1>
            <h1 id='music'>MUSIC</h1>
        </header>

        <main>
            <form id = 'login' action = login.php method = 'POST'>
                <div id = 'boxLogin'>
                <h3>Login </h3>
                <p>
                <label>Username <input type='text' name='nomeUtente'></label>
                </p>
                <p>
                <label>Password <input type='password' name='password'></label>
                </p>
                
                <?php
                    if(isset($errore)) {
                        echo "<p class='errore'>";
                        echo "Credenziali errate";
                        echo "</p>";
                    }
                ?>
                
                </div>
                
                <p>
                <label>&nbsp;<input type='submit' value='Accedi'></label>
                </p>
                
                <div id = 'boxRegistrazione'>
                <span> Non sei registrato? </span>
                <a href="signup.php" id='nuovoAccount'> Clicca qui!</a>
                </div>
            
            </form>
        </main>
    </body>
</html>













 
