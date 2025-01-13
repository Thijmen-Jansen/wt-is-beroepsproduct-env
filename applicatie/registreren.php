<?php
require_once("Library/db.functions.php");
require_once("db_connectie_pizzaria.php");

$melding = '';
$login = '';
if (isset($_POST['registreren'])) {
    $melding = ' geklikt';
    // var_dump($_POST);
        $username = sanitize(isset($_POST['naam']) ? $_POST['naam'] : null,true);
        $wachtwoord = sanitize(isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null,true);
        $email = sanitize(isset($_POST['email']) ? $_POST['email'] : null,true);
        $role = sanitize(isset($_POST['role']) ? $_POST['role'] : null,true);

        if ($username === null && $wachtwoord === null) {
            $melding = 'Missing username or password';
    } else {
        $password_hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

        $db = maakVerbinding();
        // Insert query (prepared statement)
        $sql = 'INSERT INTO LoginData (username, password, email, role)
                values (:naam, :passwordhash, :email, :role)';
        $query = $db->prepare($sql);

        // Send data to database
        $data_array = [
            'naam' => $username,
            'passwordhash' => $password_hash,
            'email' => $email,
            'role' => $role
        ];
        $succes = $query->execute($data_array);
        //var_dump($succes);

        // Check results
        if ($succes) {
            $melding = 'Gebruiker is geregistreerd.';
        } else {
            $melding = 'Registratie is mislukt.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="StylesheetPizzaria.css">
    <title>Registreren</title>
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


<main>

    <article>

        <section>


            <div>

                        <form method="post" action="">
                                
                                    <label for="naam">naam</label>
                                    <input type="text" id="naam" name="naam">
                                
                                    <label for="wachtwoord">wachtwoord</label>
                                    <input type="password" id="wachtwoord" name="wachtwoord">
                                
                                    <label for="email">email</label>
                                    <input type="email" id="email" name="email">

                                    <label for="role">Role:</label>
                                    <select name="role">
                                        <option> staff</option>
                                        <option>klant</option>
                                    </select>

                                    <input type="submit" name="registreren" value="registreren">
                                
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