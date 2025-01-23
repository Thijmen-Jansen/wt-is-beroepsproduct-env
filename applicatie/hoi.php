<?php
require_once("Library/db.functions.php");
require_once("db_connectie_pizzaria.php");
session_start();


function orderID ($username){
    $db = maakVerbinding();

    $sql = 'SELECT order_id
            FROM Pizza_Order
            WHERE client_username = :username';

    $query = $db->prepare($sql);

    $array = [
        ':username' => $username
    ];

    $resultaat = $query->execute($array);

    if($resultaat){
        if($rij = $query->fetch()){
                $orderID = $rij['order_id'];            
            return $orderID;
        }
    } else{
        echo "Fout";
        
    }
}


function bestellen($orderID){

    foreach($_SESSION['winkelwagen'] as $item){}

     $db = maakVerbinding();

     $sql =     'INSERT INTO Pizza_Order_Product ([order_id],[product_name], [quantity])
                VALUES (:orderID, :item, :quantity)';

    $query = $db->prepare($sql);

    $array = [
        ':orderID' => $orderID,
        ':item' => $item,
        ':quantity' => $quantity
    ];
    
}
    
// foreach($_SESSION['winkelwagen'] as $item){
//     echo $item;
// }
//var_dump($_SESSION['winkelwagen']);



foreach($_SESSION['winkelwagen'] as $item){
    // foreach($item as $test){
    // echo $item . $test;
    // }
    echo $item;
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
    <?php                   print_r($_SESSION['winkelwagen']);
                echo "</pre>";//echo orderID($_SESSION['User']);
    ?>
</body>
</html>