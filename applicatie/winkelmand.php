<?php
require_once 'db_connectie_pizzaria.php';
require_once("Library/db.functions.php");
session_start();
//var_dump($_POST);
$melding = '';

if (isset($_POST['clear'])) {
    $_SESSION['winkelwagen'] = [];
}

if (isset($_SESSION['User'])) {
    if (isset($_POST['afronden'])) {

        $name = sanitize(isset($_POST['name']) ? $_POST['name'] : null);
        $address = sanitize(isset($_POST['address']) ? $_POST['address'] : null);//htmlspecialchars(trim(strip_tags((isset($_POST['address']) ? $_POST['address'] : null))));
        $datetime = isset($_POST['datetime']) ? $_POST['datetime'] : null;
        $date = new DateTime($datetime);
        $formattedDate = $date->format("Y-m-d H:i:s");
        //var_dump($date);
        //var_dump($datetime);
        var_dump($_POST['datetime']);
        var_dump($_POST['name']);
        var_dump($_POST['address']);

        //var_dump($_POST);
        var_dump($formattedDate);

        

        if ($name === null && $address === null && $formattedDate === null) {
            $melding = 'Missing name, Adress or Date';
        } else {
            $db = maakVerbinding();

            $sql = 'INSERT INTO Pizza_Order ([client_username], [client_name], [personnel_username], [datetime], [status], [address]) 
                VALUES (:username, :name, :personnel, :datetime, 1, :address)';

            $query = $db->prepare($sql);

            $array = [
                ':name' => $name,
                ':username' => $_SESSION['User'],
                ':personnel' => 'Thijmen',
                ':datetime' => $formattedDate,
                ':address' => $address
            ];

            $succes = $query->execute($array);

            if ($succes) {
                $melding = 'Order confirmed';
            } else {
                $melding = 'Oops.. something went wrong';
            }
        }
    }
} else {
    $melding = 'Log in first to order.';
    
}
//---------------------------------------------------------------------------------------------


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

                <?php //winkelwagen(); 
                 echo $melding;
                 echo "<pre>";

                ?>
                <form action="" method="post">
                    <button type="submit" name="clear">Clear Basket</button>
                </form>

            </div>

            <section>

                <div>
                    <form action="" method="post">
                        <label>Name:</label>
                        <input type="text" name="name" maxlength="20" required placeholder="Maximaal 20 karakters">
                        <label>Address:</label>
                        <input type="text" name="address" required placeholder="Vul hier uw adres in">
                        <label>Date & Time:</label>
                        <input type="datetime-local" name="datetime" required>
                        <Label> Bestelling afronden:</Label>
                        <input type="submit" name="afronden" value="Bestelling afronden">

                    </form>
                </div>
            </section>


        </article>
    </main>
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