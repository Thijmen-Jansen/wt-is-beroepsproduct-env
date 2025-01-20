<?php 
   require_once 'db_connectie_pizzaria.php';
   require_once("Library/db.functions.php");


   $melding = '';  // nog niks te melden 

   //var_dump($_POST);

   if(isset($_POST['login'])) {
       // 1. lees gegevens
       $username        = sanitize($_POST['username'],true);
       $password  = sanitize($_POST['password'],true);
      
       // 2. check gegevens
       // Inhoud checken dat mag je zelf doen
       
       // 3. Ophalen van de hash uit de database
       // database
       $db = maakVerbinding();
       // Select query (prepared statement)
       $sql = 'SELECT password
               FROM [User]
               WHERE username = :name AND role = :role';
       $query = $db->prepare($sql);
   
       $data_array = [
           ':name' => $username,
           ':role' => 'Client'
       ];
       // get data from database

       $query->execute($data_array);
   
       if ($rij = $query->fetch()) {
           //gebruiker gevonden
           $passwordhash = $rij['password'];
           var_dump($rij);


           //wachtwoord checken
           if (password_verify($password, $passwordhash)) { 
                session_start();
               $_SESSION['User'] = $username;
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
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="StylesheetPizzaria.css"> 
    <title>Log in</title>
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
        <section>


            <div>
                <h4>Inloggen</h4>
                

                <!-- <form action="loginEind.php" method="post">
                    <label>Naam:</label>
                    <input type="text" id="gebruikersnaam" name="gebruikersnaam" maxlength="20" required>
                    <label>wachtwoord:</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" required>
                    <input type= "submit"  value="inloggen">
                </form> 
                <a href="logout.php">Log uit</a>

                <p>Nog geen account? <a href="registreren.html">Registreer</a> hier.</p>
                <p>Medewerker? <a href="inloggenMedewerker.html">Klik</a> hier.</p> -->
            

                <form method="post" action="">
                    <label for="username">Username</label>
                        <input type="text" id="username" name="username">  
                    <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    <input type="submit" name="login" value="login">
                </form>

                <?Php echo $melding ?>

                <p>Mederwerker? <a href="inloggenMedewerker.php">Inloggen</a></p>

    


            </div>  
        </section> 
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