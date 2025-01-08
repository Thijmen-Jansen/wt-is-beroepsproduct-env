<?php

$eten = [
    'Shoarma'=> 6.95,
    'Appels' => 10.95,
    'Tabouleh'=> 8.95,
    'Hamburger'=>  5.50
];
$drinken = [
    'Cola'=> 2.00,
    'Ayran' => 2.30,
    'Fernandes'=> 2.50,
    'Bier'=>  5.50
];

$menu = [
    'Eten' => $eten,
    'Drinken' => $drinken
];

function showMenuItems($array){
    $html = '<table>';

    foreach ( $array as $item => $prijs){
        $html .= "<tr><td> {$item} </td> <td> {$prijs} </td></tr>";
    }

    $html .= '</table>';
    return $html;

}

function showMenu(){
    $html = ' ';

    global $menu;
    foreach($menu as $key => $value){
        $html .= "<h2> {$key} </h2>";
        $html .= showMenuItems($value);
    }
    return $html;
};


?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <title>Restaurantmenu</title>
    <style>
      td:first-child {
        width: 8em;
      }
      td:nth-child(2) {
        font-style: italic;
        text-align: right;
        width: 4em;
      }
    </style>
  </head>
  <body>
    <h1>Menu</h1>

    <h2>Eten</h2>
    
      <?php
        echo showMenu();  
      ?>

    <table>
        <tr><td>Shoarma</td><td>&euro; 6.95</td></tr>
        <tr><td>Appels</td><td>&euro; 10.95</td></tr>
        <tr><td>Tabouleh</td><td>&euro; 8.95</td></tr>
        <tr><td>Hamburger</td><td>&euro; 5.50</td></tr>
    </table>

    <h2>Drinken</h2>
    <table>
        <tr><td>Cola</td><td>&euro; 2.00</td></tr>
        <tr><td>Ayran</td><td>&euro; 2.30</td></tr>
        <tr><td>Fernandes</td><td>&euro; 2.50</td></tr>
        <tr><td>Bier</td><td>&euro; 5.50</td></tr>
    </table>
  </body>
</html>

