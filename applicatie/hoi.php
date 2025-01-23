<?php
require_once("Library/db.functions.php");
require_once("db_connectie_pizzaria.php");
session_start();



    // Loop door elke rij
    function test(){
                $db = maakVerbinding();

        $sql = 'SELECT product_name, quantity
                FROM Pizza_Order_Product
                WHERE order_id IN (
                            SELECT order_id
                            FROM Pizza_Order
                            WHERE client_username = :name
                            );';

        $query = $db->prepare($sql);

        $array = [
            ':name' => $_SESSION['User']
        ];

        $succes = $query->execute($array);

                if ($rij = $query->fetchAll()) { 
            foreach ($rij as $item) {
                // Toegang tot kolommen binnen elke rij
                $order = $item['product_name'];
                $quantity = $item['quantity'];

                // Print de waarden
                echo "Product: " . $order . "<br>";
                echo "Aantal: " . $quantity . "<br>";
            }
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
    <?php   test()//echo "$quantity X $order"
    ?>
</body>
</html>