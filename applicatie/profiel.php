<?php
require_once("Library/db.functions.php");
require_once ('db_connectie_pizzaria.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="StylesheetPizzaria.css">
    <title>Profiel</title>
</head>
<body>
    <Header>
        
        <img src="images\Logo.png" alt="">
        <h1>SOLE MACHINA</h1>
        <p><?php ingelogdCheck() ?></p>

</Header>
<nav>
    <ul>
        <li><a href="index.php">🍕 MENU </a></li>
        <li><a href="winkelmand.php">🛒 WINKELMAND </a></li>
        <li><a href="profiel.php">👤 PROFIEL </a></li>
    </ul>
</nav>

<article>

    <h4>Bestelgeschiedenis</h4>


    <div>
        <h4>28/11/24</h4>
        <p>Vegan Pizza </p>
        <p>Hawaii Pizza</p>
        <p>€25.76</p>
        <p>Status: Onderweg</p>
    </div>

    <div>
        <h4>16/11/24</h4>
        <p>Hawaii Pizza</p>
        <p>Supreme Pizza</p>
        <p>€23.45</p>
        <p>Status: Bezorgd</p>
    </div>

    <div>
        <h4>26/10/24</h4>
        <p>Margherita Pizza</p>
        <p>Salami Pizza</p>
        <p>€23.45</p>
        <p>Status: Bezorgd</p>
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