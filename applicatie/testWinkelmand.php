<?php
$winkelwagen = [];


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['Bestel'])) {
//         if ($_POST['Bestel'] === 'pizza1'){
//         // Voer je PHP-code uit
//             $winkelwagen[] = 'pizza1 besteld'; // Voeg hier andere acties toe
//         } else {
//             $winkelwagen[] = 'pizza2 besteld';
//         }
// var_dump($winkelwagen);
//     }
// }


session_start(); 
// // Controleer of de array al bestaat in de sessie, anders maak je een nieuwe
if (!isset($_SESSION['winkelwagen'])) {
    $_SESSION['winkelwagen'] = [];
}

// // Verwerken van knoppen
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['button1'])) {
        // Voeg waarde 1 toe aan de array
        $_SESSION['winkelwagen'][] = "Pizza 1";
    } elseif (isset($_POST['button2'])) {
        // Voeg waarde 2 toe aan de array
        $_SESSION['winkelwagen'][] = "Pizza 2";

    }
// }

// Toon de array
// echo "<pre>";
// print_r($_SESSION['winkelwagen']);
// echo "</pre>";








// session_start(); // Sessie starten om de array op te slaan

// // Controleer of de array al bestaat in de sessie, anders maak je een nieuwe
// if (!isset($_SESSION['my_array'])) {
//     $_SESSION['my_array'] = [];
// }

// // Verwerken van knoppen
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['button1'])) {
//         // Voeg waarde 1 toe aan de array
//         $_SESSION['my_array'][] = "Waarde 1";
//     } elseif (isset($_POST['button2'])) {
//         // Voeg waarde 2 toe aan de array
//         $_SESSION['my_array'][] = "Waarde 2";
//     }
// }

// // Toon de array
// echo "<pre>";
// print_r($_SESSION['my_array']);
// echo "</pre>";




// var_dump($_POST);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- <form method="POST" action="">
    <button type="submit" name="Pizza1" >Bestel</button>
</form>

<form method="POST" action="">
    <button type="submit" name="Pizza2" >Bestel</button>
</form> -->



<form method="POST" action="">
    <button type="submit" name="button1">Bestel</button>
    <button type="submit" name="button2">Bestel</button>
</form>
<a href="logout.php">log uit</a>
<a href="test.php">bekijk winkelwagen</a>



    
</body>
</html>