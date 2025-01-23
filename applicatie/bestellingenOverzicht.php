<?php 
    require_once 'db_connectie_pizzaria.php';
    require_once("Library/db.functions.php");

    session_start();
    var_dump($_POST['status']);

    if(isset($_POST['update'])){

        $db = maakVerbinding();

        $sql = 'UPDATE Pizza_Order
                SET status = :status
                WHERE order_id = :orderID';

        $query = $db->prepare($sql);


        $array = [
            ':orderID' => $_POST['order_id'],
            ':status' => $_POST['status']
        ];


        $succes = $query->execute($array);

    }
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
        <p><?php ingelogdCheck();
        ?> </p>
    </Header>
    <nav>
        <!-- <ul>
            <li><a href="index.php">🍕 MENU </a></li>
            <li><a href="winkelmand.php">🛒 WINKELMAND </a></li>
            <li><a href="profiel.php">👤 PROFIEL </a></li>
        </ul> -->
        <?php overzicht() ?>
    </nav>

    <article>

        <h4>Bestellingen Overzicht</h4>

        <?php overzichtBestellingen() ?>


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