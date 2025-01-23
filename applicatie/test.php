<?php
session_start();


// $_SESSION['winkelwagen'] = [
//     'Shoarma'=> 6.95,
//     'Appels' => 10.95,
//     'Tabouleh'=> 8.95,
//     'Hamburger'=>  5.50
// ];
// $drinken = [
//     'Cola'=> 2.00,
//     'Ayran' => 2.30,
//     'Fernandes'=> 2.50,
//     'Bier'=>  5.50
// ];

// $menu = [
//     'Eten' => $_SESSION['winkelwagen'],
//     'Drinken' => $drinken
// ];

// function showMenuItems($array){
//     $html = '<table>';

//     foreach ( $array as $item => $prijs){
//         $html .= "<tr><td> {$item} </td> <td> {$prijs} </td></tr>";
//     }

//     $html .= '</table>';
//     return $html;

// }

// function showMenu(){
//     $html = ' ';

//     global $menu;
//     foreach($menu as $key => $value){
//         $html .= "<h2> {$key} </h2>";
//         $html .= showMenuItems($value);
//     }
//     return $html;
// };
$formattedDate = '';
if(isset($_POST['test'])){
    //$date = $_POST['test'];
    //$datum = date_format($date['test'],"Y/m/d H:i:s");

    //$formattedDate = $date->format("Y-m-d H:i:s");

    
// Maak een nieuw DateTime-object

}
function winkelwagen(){
    $html = '';

    foreach($_SESSION['winkelwagen'] as $item){
        $html = "<section><div>";
        echo $html;
        echo $item;
        
        $html = "</div></section>";
        echo $html;

        // echo "<section><div>";
        // print_r($item);
        // echo "</div></section>";

    }
    return $html;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StylesheetPizzaria.css">
    <title>Document</title>
</head>
<body>
<?php //echo winkelwagen(); ?>

 <button> <?php //reset($_SESSION['winkelwagen']) ?> </button> 


 <form action="" method="post">
    <input type="datetime-local" name="test" id="">
    <input type="submit" value="hoi">
 </form>

 <?php 

echo $formattedDate; // Output: 2025-01-21 14:30:00
?>
    
</body>
</html>