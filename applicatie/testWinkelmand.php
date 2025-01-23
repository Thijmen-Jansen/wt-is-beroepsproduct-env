<?php 
    require_once 'db_connectie_pizzaria.php';
    require_once("Library/db.functions.php");
    session_start();
    var_dump($_POST);
    $melding = '';

    if(isset($_POST['clear'])){
        $_SESSION['winkelwagen'] = [];
    }

    if(isset($_POST['afronden'])){

        $name = sanitize(isset($_POST['name']) ? $_POST['name'] : null, false);
        $addres = sanitize(isset($_POST['addres']) ? $_POST['addres'] : null,false);
        $datetime = sanitize(isset($_POST['datetime']) ? $_POST['datetime'] : null,false);

        if ($name === null || $addres === null || $datetime === null) {
            $melding = 'Missing name, Adress or Date';
        }
    
//---------------------------------------------------------------------------------------------
    
} // else {
// //     $password_hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

//     $db = maakVerbinding();
//     // Insert query (prepared statement)
//     $sql = 'INSERT INTO LoginData (username, password, email, role)
//             values (:naam, :passwordhash, :email, :klant)';
//     $query = $db->prepare($sql);

//     // Send data to database
//     $data_array = [
//         'naam' => $username,
//         'passwordhash' => $password_hash,
//         'email' => $email,
//         'klant' => 'klant'
//     ];
//     $succes = $query->execute($data_array);
//     var_dump($succes);

//     // Check results
//     if ($succes) {
//         $melding = 'Gebruiker is geregistreerd.';
//     } else {
//         $melding = 'Registratie is mislukt.';
//     }
//} -----------------------------------------------------------------
function test(){
if(isset($_SESSION['winkelwagen'])){
    foreach($_SESSION['winkelwagen'] as $item => $hoi){
        echo $item;
        echo $hoi;
       

    }
return $item;
}
}


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
        
            <?php test()//winkelwagen() 
            
            ?>
            <form action="" method="post">
                <button type="submit" name="clear">Clear Basket</button>
            </form>
        
    </div>

    <section>
        
         <div>
            <form action="" method="post">
                <label>Naam:</label>
                <input type="text" name="name" maxlength="20" required placeholder="Maximaal 20 karakters">
                <label>Adres:</label>
                <input type="text" name="addres" required placeholder="Vul hier uw adres in">
                <label>Vul hier de datum en tijd in:</label>
                <input type="datetime-local" name="datetime" required>
                <Label> Bestelling afronden:</Label>
                <input type= "submit" name="afronden" value="Bestelling afronden">
                
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