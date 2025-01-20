<?php 
    require_once 'db_connectie_pizzaria.php';
    require_once("Library/db.functions.php");

    session_start();
    $_SESSION['winkelwagen'] = [];

    if (!isset($_SESSION['winkelwagen'])) {
        $_SESSION['winkelwagen'] = [];
    }

    
    if (isset($_POST['Margherita Pizza'])) {
        // Voeg waarde 1 toe aan de array
        $_SESSION['winkelwagen'][] = "Margherita Pizza";

    } elseif (isset($_POST['Pepperoni Pizza'])) {
        // Voeg waarde 2 toe aan de array
        $_SESSION['winkelwagen'][] = "Pepperoni Pizza";

    }elseif (isset($_POST['Supreme Pizza'])) {
        // Voeg waarde 2 toe aan de array
        $_SESSION['winkelwagen'][] = "Supreme Pizza";

    }elseif (isset($_POST['Vegetarische Pizza'])) {
        // Voeg waarde 2 toe aan de array
        $_SESSION['winkelwagen'][] = "Vegetarische Pizza";

    }elseif (isset($_POST['Special Pizza'])) {
        // Voeg waarde 2 toe aan de array
        $_SESSION['winkelwagen'][] = "Special Pizza";

    }elseif (isset($_POST['Hawaii Pizza'])) {
        // Voeg waarde 2 toe aan de array
        $_SESSION['winkelwagen'][] = "Hawaii Pizza";

    }elseif (isset($_POST['Knoflookbrood'])) {
        // Voeg waarde 2 toe aan de array
        $_SESSION['winkelwagen'][] = "Knoflookbrood";

    }elseif (isset($_POST['Blikje Cola'])) {
        // Voeg waarde 2 toe aan de array
        $_SESSION['winkelwagen'][] = "Blikje Cola";

    }elseif (isset($_POST['Blikje Sprite'])) {
        // Voeg waarde 2 toe aan de array
        $_SESSION['winkelwagen'][] = "Blikje Sprite";
    }

    var_dump($_SESSION['winkelwagen']);
    var_dump($_POST);

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
                    <form action="" method="post">
                    <input type="number" name="aantal" id="aantal" placeholder="Aantal" min="1"> <button name="Margherita Pizza" value="Margherita Pizza">Bestel</button>
                    </form>
            </div>

            <div>
                <img src="images/SalamiPizza.jpg" alt="">
                    <h5>Pepperoni Pizza</h5>
                    <p>De Pepperoni pizza is een hartige favoriet, belegd met tomatensaus, gesmolten mozzarella, pittige salami en een vleugje oregano. Simpel, maar heerlijk rijk van smaak!</p>
                    <form action="" method="post">
                    <input type="number" name="aantal" id="aantal" placeholder="Aantal" min="1"> <button name="Pepperoni Pizza" value="Pepperoni Pizza">Bestel</button> 
                    </form>

            </div>

            <div>
                
                    <img src="images/SupremePizza.avif" alt="">
                    <h5>Supreme Pizza</h5>
                    <p>De supreme pizza is een smaakvolle topper, rijk belegd met tomatensaus, gesmolten kaas, salami, ham, zwarte olijven, paprika en verse basilicum. Een perfecte mix van hartig en aromatisch!</p>
                    <form action="" method="post">
                    <input type="number" name="aantal" id="aantal" placeholder="Aantal" min="1"> <button name="Supreme Pizza" value="Supreme Pizza">Bestel</button> 
                    </form>

            </div>

            <div>
                <img src="images/VegetarischePizza.jpg" alt="">
                    <h5>Vegetarische Pizza</h5>
                    <p>Deze vegetarische pizza zit boordevol smaak en kleur. Belegd met sappige cherrytomaten, verse rucola, malse champignons, gesmolten mozzarella en een basis van tomatensaus, is het een heerlijke keuze voor liefhebbers van groente!</p>
                    <form action="" method="post">
                     <input type="number" name="aantal" id="aantal" placeholder="Aantal" min="1"> <button name="Vegetarische Pizza" value="Vegetarische Pizza">Bestel</button>
                    </form>

            </div>
            
            <div>
                <img src="images/SpecialPizza.png" alt="">
                    <h5>Special Pizza</h5>
                    <p>De special pizza is een heerlijke combinatie van smaken, belegd met tomatensaus, gesmolten kaas, malse ham, knapperige paprika en zachte ui. Een klassieke keuze met een verfijnde twist!</p>
                    <form action="" method="post">
                    <input type="number" name="aantal" id="aantal" placeholder="Aantal" min="1"> <button name="Special Pizza" value="Special Pizza">Bestel</button>
                    </form>
            </div>

            <div>
                <img src="images/HawaiiPizza.jpg" alt="">
                    <h5>Hawaii Pizza</h5>
                    <p>De Hawaii pizza is een tropische favoriet, belegd met tomatensaus, gesmolten kaas, malse ham en zoete ananas. Een perfecte balans tussen hartig en zoet!</p>
                    <form action="" method="post">
                    <input type="number" name="aantal" id="aantal" placeholder="Aantal" min="1"> <button name="Hawaii Pizza" value="Hawaii Pizza">Bestel</button> 
                    </form>
            </div>

            <div>
                <img src="images/Knoflookbrood.jpg" alt="">
                    <h5>Knoflookbrood</h5>
                    <p>Dit Knoflookbrood word vers voor u bereid en is een heerlijk voorgerecht.</p>
                    <form action="" method="post">
                    <input type="number" name="aantal" id="aantal" placeholder="Aantal" min="1"> <button name="Knoflookbrood" value="Knoflookbrood">Bestel</button> 
                    </form>
            </div>

            <div>
                <img src="images/BlikjeCola.jpg" alt="">
                    <h5>Blikje Cola</h5>
                    <p>Een blikje Cola om de dorst te lessen en zit boordevol smaak.</p>
                    <form action="" method="post">
                    <input type="number" name="aantal" id="aantal" placeholder="Aantal" min="1"> <button name="Blikje Cola" value="Blikje Cola">Bestel</button> 
                    </form>
            </div>

            <div>
                <img src="images/BlikjeSprite.jpg" alt="">
                    <h5>Blikje Sprite</h5>
                    <p>Een blikje Sprite om de dorst te lessen en zit boordevol smaak.</p>
                    <form action="" method="post">
                    <input type="number" name="aantal" id="aantal" placeholder="Aantal" min="1"> <button name="Blikje Sprite" value="Blikje Sprite">Bestel</button> 
                    </form>
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
