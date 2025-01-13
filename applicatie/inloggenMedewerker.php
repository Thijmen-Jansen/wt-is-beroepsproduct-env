<?php 
   require_once 'db_connectie_pizzaria.php';
   require_once("Library/db.functions.php");


   $melding = '';  // nog niks te melden 


   if(isset($_POST['inloggen'])) {
       // 1. lees gegevens
       $naam        = sanitize($_POST['gebruikersnaam'],true);
       $wachtwoord  = sanitize($_POST['wachtwoord'],true);
       
      
       // 2. check gegevens
       // Inhoud checken dat mag je zelf doen
       
       // 3. Ophalen van de hash uit de database
       // database
       

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
        
        <img src="images\Logo.png" alt="">
        <h1>SOLE MACHINA</h1>
        <p><?php ingelogdCheck() ?> </p>
</Header>
<nav>
    <ul>
        <li><a href="index.php">🍕 MENU </a></li>
        <li><a href="winkelmand.php">🛒 WINKELMAND </a></li>
        <li><a href="profiel.php">👤 PROFIEL </a></li>
    </ul>
</nav>

<main>

    <article>

        <section>


            <div>
                <h4>Inloggen</h4>
                <form action="" method="post">
                    <label>Naam:</label>
                    <input type="text" name="Naam" maxlength="20" required>
                    <label>Wachtwoord:</label>
                    <input type="text" name="wachtwoord" required>

          
           <?php  //var_dump($rij); ?>
                   
                    <input type= "submit"  value="Inloggen">
                </form>


            </div>  
        </section>
    </article>
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