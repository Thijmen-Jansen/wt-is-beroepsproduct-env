<?php
    require_once 'db_connectie_pizzaria.php';

    $melding = '';  // nog niks te melden 

    if(isset($_POST['inloggen'])) {
        // 1. lees gegevens
        $naam        = $_POST['gebruikersnaam'];
        $wachtwoord  = $_POST['wachtwoord'];
       
        // 2. check gegevens
        // Inhoud checken dat mag je zelf doen

        // 3. Ophalen van de hash uit de database
        // database
        $db = maakVerbinding();
        // Select query (prepared statement)
        $sql = 'SELECT password
                FROM logins
                WHERE username = :naam';
        $query = $db->prepare($sql);
    
        $data_array = [
            ':naam' => $naam
        ];
        // get data from daatabase
        $query->execute($data_array);
    
        if ($rij = $query->fetch()) {
            //gebruiker gevonden
            $passwordhash = $rij['password'];
    
            //wachtwoord checken
            if (password_verify($wachtwoord, $passwordhash)) {
                session_start();
                // header('location: index.php');
                $_SESSION['gebruiker'] = $naam;
                $melding = 'Gebruker is ingelogd';
            } else {
                $melding = 'fout: incorrecte inloggegevens!!';
            }
        } else {
            $melding = 'Incorrecte inloggegevens';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inloggen</title>
</head>
<body>
<form method="post" action="">
<table>
    <tr>
        <td><label for="gebruikersnaam">gebruikersnaam</label></td>
        <td><input type="text" id="gebruikersnaam" name="gebruikersnaam"></td>
    </tr>
    <tr>
        <td><label for="wachtwoord">wachtwoord</label></td>
        <td><input type="password" id="wachtwoord" name="wachtwoord"></td>
    </tr>
    <tr>
        <td> </td>
        <td><input type="submit" name="inloggen" value="inloggen"></td>
        <td> <a href="logout.php">uitloggen</a></td>
    </tr>
</table>
</form>
<?=$melding?>
</body>
</html>