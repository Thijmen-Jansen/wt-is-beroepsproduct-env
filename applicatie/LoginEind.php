<?php
    require_once 'db_connectie_pizzaria.php';

    $melding = '';  // nog niks te melden 


    if(isset($_POST['inloggen'])) {
        // 1. lees gegevens
        $naam        = $_POST['gebruikersnaam'];
        $wachtwoord  = $_POST['wachtwoord'];
       
        // 2. check gegevens
        // Inhoud checken dat mag je zelf doen
        
        // 3. Ophalen van de hash uit de database
        // database
        $db = maakVerbinding();
        // Select query (prepared statement)
        $sql = 'SELECT password
                FROM logins
                WHERE username = :naam';
        $query = $db->prepare($sql);
    
        $data_array = [
            ':naam' => $naam
        ];
        // get data from daatabase
        $query->execute($data_array);
    
        if ($rij = $query->fetch()) {
            //gebruiker gevonden
            $passwordhash = $rij['password'];
    
            //wachtwoord checken
            if (password_verify($wachtwoord, $passwordhash)) {
                session_start();
                $_SESSION['gebruiker'] = $naam;
                header('location: profiel.php');
                $melding = 'Gebruker is ingelogd';
            } else {
                $melding = 'fout: incorrecte inloggegevens!!';
            }
        } else {
            $melding = 'Incorrecte inloggegevens';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="StylesheetPizzaria.css"> 
    <title>Log in</title>
</head>
 <body>
    <Header>
        
        <img src="C:/Users/janse/OneDrive/Documents/GitHub/beroepsproduct-wtux-Thijmen-Jansen/Images/Logo.png" alt="">
        <h1>SOLE MACHINA</h1>
        <p><?php
        if (isset($username)){
            echo ''.$username.'';
        } else {
            $html = '<a href="Login.html">log in</a>';
        } 
        echo $html;
        ?> 
        
</Header>
<nav>
    <ul>
        <li><a href="index.html">🍕 MENU </a></li>
        <li><a href="winkelmand.html">🛒 WINKELMAND </a></li>
        <li><a href="profiel.html">👤 PROFIEL </a></li>
    </ul>
</nav>

<main>
        <section>


            <div>
                <h4>Inloggen</h4>
                

                <!-- <form action="loginEind.php" method="post">
                    <label>Naam:</label>
                    <input type="text" id="gebruikersnaam" name="gebruikersnaam" maxlength="20" required>
                    <label>wachtwoord:</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" required>
                    <input type= "submit"  value="inloggen">
                </form> 
                <a href="logout.php">Log uit</a>

                <p>Nog geen account? <a href="registreren.html">Registreer</a> hier.</p>
                <p>Medewerker? <a href="inloggenMedewerker.html">Klik</a> hier.</p> -->
            

                <form method="post" action="">
                    <label for="gebruikersnaam">gebruikersnaam</label>
                        <input type="text" id="gebruikersnaam" name="gebruikersnaam">  
                    <label for="wachtwoord">wachtwoord</label></td>
                        <input type="password" id="wachtwoord" name="wachtwoord">
                    <input type="submit" name="inloggen" value="inloggen">

    


            </div>  
        </section> 
</main>


<footer>
        
    <div>
        <ul class="Contact">
            <li><h5>Contact</h5></li>
            <li> Tel: +31 6 12 34 56 78</li>
            <li> Email: SoleMachina@outlook.com </li>
            <li><a href="PrivacyverklaringAVG.pdf">Privacyverklaring</a></li>
            
        </ul>

        <ul class="Populair">
            <li><h5>Populair</h5></li>
            <li> Pizza Hawaii</li>
            <li> Pizza Supreme</li>
        </ul>
    </div> 
    </footer>
    
</body> 
</html>