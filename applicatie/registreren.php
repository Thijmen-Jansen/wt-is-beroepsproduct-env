<?php 
    require_once ('db_connectie_pizzaria.php');
    require_once("Library/db.functions.php");

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="StylesheetPizzaria.css">
    <title>Registreren</title>
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
                <h4>Registreren</h4>
                <form action="Login.html" method="post">
                    <label>Naam: *</label>
                    <input type="text" name="Naam" required>
                    <label>E-mail: *</label>
                    <input type="email" name="Email"  required>
                    <label>Telefoonnummer: </label>
                    <input type="number" name="telefoonnummer" >
                    <label>wachtwoord: *</label>
                    <input type="text" name="wachtwoord" required>
                    <label>Herhaal wachtwoord: *</label>
                    <input type="text" name="wachtwoord" required>
                    
                    <input type= "submit"  value="Registreren">
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