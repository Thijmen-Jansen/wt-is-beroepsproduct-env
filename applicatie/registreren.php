<?php
require_once("Library/db.functions.php");
require_once("db_connectie_pizzaria.php");

$melding = '';
$login = '';
if (isset($_POST['register'])) {
    $melding = ' geklikt';
    // var_dump($_POST);
        $username = sanitize(isset($_POST['name']) ? $_POST['name'] : null,true);
        $password = sanitize(isset($_POST['password']) ? $_POST['password'] : null,true);
        $firstName = sanitize(isset($_POST['first_name']) ? $_POST['first_name'] : null,true);
        $lastName = sanitize(isset($_POST['last_name']) ? $_POST['last_name'] : null,true);
        $role = sanitize(isset($_POST['role']) ? $_POST['role'] : null,true);

        if ($username === null && $password === null) {
            $melding = 'Missing username or password';
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $db = maakVerbinding();
        // Insert query (prepared statement)
        $sql = 'INSERT INTO [User] (username, password, first_name, last_name, address, role)
                values (:name, :passwordhash, :first_name, :last_name, NULL, :role)';
        $query = $db->prepare($sql);

        // Send data to database
        $data_array = [
            ':name' => $username,
            ':passwordhash' => $password_hash,
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':role' => $role
        ];
        $succes = $query->execute($data_array);
        //var_dump($succes);

        // Check results
        if ($succes) {
            $melding = 'Gebruiker is geregistreerd.';
            header("Location: login.php");
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
                                
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name">
                                
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password">
                                
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name">

                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name">

                                    <label for="role">Role:</label>
                                    <select name="role">
                                        <option> Personnel</option>
                                        <option>Client</option>
                                    </select>

                                    <input type="submit" name="register" value="register">

                                    <?php echo $melding ?>
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