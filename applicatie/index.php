<?php
require_once 'db_connectie_pizzaria.php';
require_once("Library/db.functions.php");

session_start();
var_dump($_SESSION['item']);
$quantity = '';
if (isset($_SESSION['User'])) {
    if (isset($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
    }

    if (!isset($_SESSION['winkelwagen'])) {
        $_SESSION['winkelwagen'] = [
            
        ];
    }
    $item = [];
    $aantal = [];
    if (!empty(($_POST['quantity']))) {
       
        if (isset($_POST['Margherita_Pizza'])) {
            // $_SESSION['winkelwagen']['item'] = ["Margherita Pizza"];
            // $_SESSION['winkelwagen']['quantity'] = [$quantity];
            $_SESSION['item'] = ["Margherita Pizza"];
        } elseif (isset($_POST['Pepperoni_Pizza'])) {
            // $_SESSION['winkelwagen']['item'] = "Pepperoni Pizza";
            // $_SESSION['winkelwagen']['quantity'] = $quantity;
            $_SESSION['item'] = ["Pepperoni Pizza"];
        } elseif (isset($_POST['Supreme_Pizza'])) {
            $_SESSION['winkelwagen']['item'] = "Supreme Pizza";
            $_SESSION['winkelwagen']['quantity'] = $quantity;

        } elseif (isset($_POST['Vegetarische_Pizza'])) {
            $_SESSION['winkelwagen']['item'] = "Vegetarische Pizza";
            $_SESSION['winkelwagen']['quantity'] = $quantity;

        } elseif (isset($_POST['Special_Pizza'])) {
            $_SESSION['winkelwagen']['item'] = "Special Pizza";
            $_SESSION['winkelwagen']['quantity'] = $quantity;

        } elseif (isset($_POST['Hawaii_Pizza'])) {
            $_SESSION['winkelwagen']['item'] = "Hawaii Pizza";
            $_SESSION['winkelwagen']['quantity'] = $quantity;

        } elseif (isset($_POST['Knoflookbrood'])) {
            $_SESSION['winkelwagen']['item'] = "Knoflookbrood Pizza";
            $_SESSION['winkelwagen']['quantity'] = $quantity;

        } elseif (isset($_POST['Blikje_Cola'])) {
            $_SESSION['winkelwagen']['item'] = "Coca Cola";
            $_SESSION['winkelwagen']['quantity'] = $quantity;

        } elseif (isset($_POST['Blikje_Sprite'])) {
            $_SESSION['winkelwagen']['item'] = " Sprite";
            $_SESSION['winkelwagen']['quantity'] = $quantity;
        }
    } else{
       
        var_dump($_SESSION['item']);
        // $_SESSION['winkelwagen'] = [
        //     'item' => $item,
        //     'quantity' => $aantal
        // ];
    }
}
//var_dump($_SESSION['winkelwagen']);
//--------------------------------------------------------------------------------------



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
            <p>De margherita pizza is een Italiaanse klassieker met tomatensaus, mozzarella en verse basilicum, simpel
                en vol smaak.</p>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1"> <button
                    name="Margherita_Pizza" value="Margherita Pizza">Bestel</button>
            </form>
        </div>

        <div>
            <img src="images/SalamiPizza.jpg" alt="">
            <h5>Pepperoni Pizza</h5>
            <p>De Pepperoni pizza is een hartige favoriet, belegd met tomatensaus, gesmolten mozzarella, pittige salami
                en een vleugje oregano. Simpel, maar heerlijk rijk van smaak!</p>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1"> <button
                    name="Pepperoni_Pizza" value="Pepperoni Pizza">Bestel</button>
            </form>

        </div>

        <div>

            <img src="images/SupremePizza.avif" alt="">
            <h5>Supreme Pizza</h5>
            <p>De supreme pizza is een smaakvolle topper, rijk belegd met tomatensaus, gesmolten kaas, salami, ham,
                zwarte olijven, paprika en verse basilicum. Een perfecte mix van hartig en aromatisch!</p>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1"> <button
                    name="Supreme_Pizza" value="Supreme Pizza">Bestel</button>
            </form>

        </div>

        <div>
            <img src="images/VegetarischePizza.jpg" alt="">
            <h5>Vegetarische Pizza</h5>
            <p>Deze vegetarische pizza zit boordevol smaak en kleur. Belegd met sappige cherrytomaten, verse rucola,
                malse champignons, gesmolten mozzarella en een basis van tomatensaus, is het een heerlijke keuze voor
                liefhebbers van groente!</p>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1"> <button
                    name="Vegetarische_Pizza" value="Vegetarische Pizza">Bestel</button>
            </form>

        </div>

        <div>
            <img src="images/SpecialPizza.png" alt="">
            <h5>Special Pizza</h5>
            <p>De special pizza is een heerlijke combinatie van smaken, belegd met tomatensaus, gesmolten kaas, malse
                ham, knapperige paprika en zachte ui. Een klassieke keuze met een verfijnde twist!</p>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1"> <button
                    name="Special_Pizza" value="Special Pizza">Bestel</button>
            </form>
        </div>

        <div>
            <img src="images/HawaiiPizza.jpg" alt="">
            <h5>Hawaii Pizza</h5>
            <p>De Hawaii pizza is een tropische favoriet, belegd met tomatensaus, gesmolten kaas, malse ham en zoete
                ananas. Een perfecte balans tussen hartig en zoet!</p>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1"> <button
                    name="Hawaii_Pizza" value="Hawaii Pizza">Bestel</button>
            </form>
        </div>

        <div>
            <img src="images/Knoflookbrood.jpg" alt="">
            <h5>Knoflookbrood</h5>
            <p>Dit Knoflookbrood word vers voor u bereid en is een heerlijk voorgerecht.</p>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1"> <button
                    name="Knoflookbrood" value="Knoflookbrood">Bestel</button>
            </form>
        </div>

        <div>
            <img src="images/BlikjeCola.jpg" alt="">
            <h5>Blikje Cola</h5>
            <p>Een blikje Cola om de dorst te lessen en zit boordevol smaak.</p>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1"> <button
                    name="Blikje_Cola" value="Blikje Cola">Bestel</button>
            </form>
        </div>

        <div>
            <img src="images/BlikjeSprite.jpg" alt="">
            <h5>Blikje Sprite</h5>
            <p>Een blikje Sprite om de dorst te lessen en zit boordevol smaak.</p>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1"> <button
                    name="Blikje_Sprite" value="Blikje Sprite">Bestel</button>
            </form>
        </div>
    </section>

    <footer>

        <div>
            <ul class="Contact">
                <li>
                    <h5>Contact</h5>
                </li>
                <li> Tel: +31 6 12 34 56 78</li>
                <li> Email: SoleMachina@outlook.com </li>
                <li><a href="PrivacyverklaringAVG.pdf">Privacyverklaring</a></li>

            </ul>

            <ul class="Populair">
                <li>
                    <h5>Populair</h5>
                </li>
                <li> Pizza Hawaii</li>
                <li> Pizza Supreme</li>
            </ul>
        </div>
    </footer>
</body>

</html>