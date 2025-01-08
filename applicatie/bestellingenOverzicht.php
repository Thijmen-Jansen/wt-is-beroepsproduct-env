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
    <title>Profiel Medewerker</title>
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

        <h4>Bestellingen Overzicht</h4>

        <div>
            <h5> <a href="order8374.html">#8374</a></h5>
            <p>Jansen</p>
            <p>2X Salami pizza...</p>
            <p>18:00 uur</p>
        </div>

        <div>
            <h5>#8373</h5>
            <p>Pieters</p>
            <p>1X Vegetarische pizza...</p>
            <p>17:55 uur</p>
        </div>

        <div>
            <h5>#8372</h5>
            <p>De Jong</p>
            <p>3X Supreme pizza...</p>
            <p>17:52 uur</p>
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
    </article>
</body>
</html>