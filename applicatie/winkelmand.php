<?php 
    require_once 'db_connectie_pizzaria.php';
    require_once("Library/db.functions.php");
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="StylesheetPizzaria.css">
    <title>winkelmand</title>

</head>
<body>
    <Header>
            
        <img src="images\Logo.png" alt="">
        <h1>SOLE MACHINA</h1>
        <p> <?php ingelogdCheck() ?> </p>
</Header>
<nav>
    <ul>
        <li><a href="index.php">🍕 MENU </a></li>
        <li><a href="winkelmand.php">🛒 WINKELMAND </a></li>
        <li><a href="profiel.php">👤 PROFIEL </a></li>
    </ul>
</nav>
<main>
    <h4>Bestelling</h4>

<article>

    
    <div>
        
            <h6>5X Supreme Pizza</h6>    
            <h6>2X Hawaii Pizza</h6>
            <h6>1X Vegetarisch Pizza</h6>
        
    </div>

    <section>
        
         <div>
            <form action="BestellingAfgerond.html" method="post">
                <label>Naam:</label>
                <input type="text" name="Naam" maxlength="20" required placeholder="Maximaal 20 karakters">
                <label>Telefoonnummer:</label>
                <input type="number" name="telefoonnummer" >
                <label>Adres:</label>
                <input type="text" name="adres" required placeholder="Vul hier uw adres in">
                <label>Vul hier de datum en tijd in:</label>
                <input type="datetime-local" name="datum" required>
                <Label> Bestelling afronden:</Label>
                <input type= "submit" value="Bestelling afronden">
                
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