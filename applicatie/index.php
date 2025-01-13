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
    <title>Pizzeria Sole Machina</title>
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

    <section>
        
            <div>
                <img src="images/pizzamargherita.jpg" alt="">
                    <h5>Margherita Pizza</h5>
                    <p>De margherita pizza is een Italiaanse klassieker met tomatensaus, mozzarella en verse basilicum, simpel en vol smaak.</p>
                    <a href="winkelmand.php">Bestellen</a>
            </div>

            <div>
                <img src="images/SalamiPizza.jpg" alt="">
                    <h5>Salami Pizza</h5>
                    <p>De salami pizza is een hartige favoriet, belegd met tomatensaus, gesmolten mozzarella, pittige salami en een vleugje oregano. Simpel, maar heerlijk rijk van smaak!</p>
                    <a href="winkelmand.php">Bestellen</a>

            </div>

            <div>
                
                    <img src="images/SupremePizza.avif" alt="">
                    <h5>Supreme Pizza</h5>
                    <p>De supreme pizza is een smaakvolle topper, rijk belegd met tomatensaus, gesmolten kaas, salami, ham, zwarte olijven, paprika en verse basilicum. Een perfecte mix van hartig en aromatisch!</p>
                    <a href="winkelmand.php">Bestellen</a>

            </div>

            <div>
                <img src="images/VegetarischePizza.jpg" alt="">
                    <h5>Vegetarische Pizza</h5>
                    <p>Deze vegetarische pizza zit boordevol smaak en kleur. Belegd met sappige cherrytomaten, verse rucola, malse champignons, gesmolten mozzarella en een basis van tomatensaus, is het een heerlijke keuze voor liefhebbers van groente!</p>
                    <a href="winkelmand.php">Bestellen</a>

            </div>
            
            <div>
                <img src="images/SpecialPizza.png" alt="">
                    <h5>Special Pizza</h5>
                    <p>De special pizza is een heerlijke combinatie van smaken, belegd met tomatensaus, gesmolten kaas, malse ham, knapperige paprika en zachte ui. Een klassieke keuze met een verfijnde twist!</p>
                    <a href="winkelmand.php"> Bestellen</a>
            </div>

            <div>
                <img src="images/HawaiiPizza.jpg" alt="">
                    <h5>Hawaii Pizza</h5>
                    <p>De Hawaii pizza is een tropische favoriet, belegd met tomatensaus, gesmolten kaas, malse ham en zoete ananas. Een perfecte balans tussen hartig en zoet!</p>
                    <a href="winkelmand.php"> Bestellen</a>
            </div>
    </section>

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
