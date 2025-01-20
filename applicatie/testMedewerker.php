<?php 
   require_once 'db_connectie_pizzaria.php';
   require_once("Library/db.functions.php");


   $melding = 'test';  // nog niks te melden 

   //var_dump($_POST);

   if(isset($_POST['inloggen'])) {
       // 1. lees gegevens
       $naam        = sanitize($_POST['naam'],true);
       $wachtwoord  = sanitize($_POST['wachtwoord'],true);
      
       // 2. check gegevens
       // Inhoud checken dat mag je zelf doen
       
       // 3. Ophalen van de hash uit de database
       // database
       $db = maakVerbinding();
       // Select query (prepared statement)
       $sql = 'SELECT password
               FROM LoginData
               WHERE username = :naam AND role = :role';
       $query = $db->prepare($sql);
   
       $data_array = [
           ':naam' => $naam,
           ':role' => 'staff'
       ];
       // get data from database

       $query->execute($data_array);
   
       if ($rij = $query->fetch()) {
           //gebruiker gevonden
           $passwordhash = $rij['password'];
           var_dump($rij);


           //wachtwoord checken
           if (password_verify($wachtwoord, $passwordhash)) { 
                session_start();
               $_SESSION['gebruiker'] = $naam;
               header('location: profiel.php');
               $melding = 'Gebruker is ingelogd';
               echo $melding;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
                    <label>Naam:</label>
                    <input type="text" name="naam" maxlength="20" required>
                    <label>Wachtwoord:</label>
                    <input type="text" name="wachtwoord" required>
                   
                    <input type= "submit" name="inloggen" value="Inloggen">
                </form>

                <?php echo $melding ?>
</body>
</html>