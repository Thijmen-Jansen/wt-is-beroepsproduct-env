<?php 
    require_once 'db_connectie_pizzaria.php';
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

<article>
    <h4><a href="bestellingenOverzicht.html">Bestellingen Overzicht</a></h4>
    <div>
        <h5>#8374</h5>
        <p>Jansen</p>
        <p>2X Salami pizza</p>
        <p>1X Vegetarische pizza</p>
        <p>17:55 uur</p>
        <p>Status:</p>
        <select name="Status">
            <option> In de oven</option>
            <option>Onderweg</option>
            <option>Word bereid</option>
        </select>
        <input class="Status" type="submit" value="Updaten">
    </div>
</article>


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