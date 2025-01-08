<?php
// require_once("Library/db.functions.php");
require_once("db_connectie_pizzaria.php");

$melding = '';
$login = '';
if (isset($_POST['registreren'])) {
    $melding = ' geklikt';
    var_dump($_POST);
        $username = isset($_POST['naam']) ? $_POST['naam'] : null;
        $wachtwoord = isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null;

        if ($username === null && $wachtwoord === null) {
            $melding = 'Missing username or password';
    } else {
        $password_hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

        $db = maakVerbinding();
        // Insert query (prepared statement)
        $sql = 'INSERT INTO logins (username, password)
                values (:naam, :passwordhash)';
        $query = $db->prepare($sql);

        // Send data to database
        $data_array = [
            'naam' => $username,
            'passwordhash' => $password_hash
        ];
        $succes = $query->execute($data_array);
        var_dump($succes);

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
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
</head>

<body>
    <form method="post" action="">
        <table>
            <tr>
                <td><label for="naam">naam</label></td>
                <td><input type="text" id="naam" name="naam"></td>
            </tr>
            <tr>
                <td><label for="wachtwoord">wachtwoord</label></td>
                <td><input type="password" id="wachtwoord" name="wachtwoord"></td>
            </tr>
            <tr>
                <td> </td>
                <td><input type="submit" name="registreren" value="registreren"></td>
            </tr>
        </table>
    </form>
    <div>
        <?php
        echo $melding;
        ?>
    </div>
</body>

</html>