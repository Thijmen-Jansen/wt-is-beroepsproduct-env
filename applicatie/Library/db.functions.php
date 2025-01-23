<?php
//require_once 'db_connectie.php';

function toonTabel($tabel)
{
    $db = maakVerbinding();
    $sql = "select * from $tabel";
    $dataset = $db->query($sql);


    return toonTabelInhoud($dataset);

}

function toonTabelInhoud($dataset)
{

    $html = '<table>';

    $html .= '<thead><tr>';
    for ($i = 0; $i < $dataset->columnCount(); $i++) {
        $col = $dataset->getColumnMeta($i);
        $html .= '<th>' . $col['name'] . '<th>';
    }

    $html .= '</tr></thead>';

    foreach ($dataset as $row) {
        $html .= '<tr>';

        for ($i = 0; $i < (count($row) / 2); $i++) {

            $html .= '<td>' . $row[$i] . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
}

function getGenreSelectBox($selection)
{
    $db = maakVerbinding();
    $sql = 'select genrenaam 
            from Genre';
    $data = $db->query($sql);

    $selectbox = '<select id="genrenaam" name="genrenaam">';
    foreach ($data as $rij) {
        $genrenaam = $rij['genrenaam'];
        $selectbox .= "<option value=\"$genrenaam\">$genrenaam</option>";
    }
    $selectbox .= '</select>';

    return $selectbox;
}

function sanitize($string, $allowNull = false)
{

    if ($allowNull) {
        if ($string === null) {
            return null;
        }
        } else {
            return htmlspecialchars(trim(strip_tags($string)));
        }
}



function ingelogdCheck()
{
    $html = '';

    if (isset($_SESSION['User'])) {
        if(!empty($_SESSION['User'])){
        $username = $_SESSION['User'];
        echo '' . $username . '';
        $html = '<a href="Logout.php">Log uit</a>';
        echo $html;
        } 
    } else if(isset($_SESSION['Personnel'])){
        $username = $_SESSION['Personnel'];
        echo '' . $username . '';
        $html = '<a href="Logout.php">Log uit</a>';
        echo $html;
    } else {
        $html = '<a href="Login.php">log in</a>';
        echo $html;
    }

}

function winkelwagen(){
    $html = '';

    if(isset($_SESSION['winkelwagen'])){
        foreach($_SESSION['winkelwagen'] as $quantity){
            foreach($_SESSION['winkelwagen']['quantity'] as $item){
            $html = "<section><div>";
            echo $html;
            echo $item;
            
            $html = "</div></section>";
            echo $html;

            // echo "<section><div>";
            // print_r($item);
            // echo "</div></section>";
            }
        }
    //return $html;
    }
}

function profiel(){
    if(isset($_SESSION['User'])){
            $db = maakVerbinding();

        $sql = 'SELECT P.client_name, POP.product_name, POP.quantity, p.status
                FROM Pizza_Order P INNER JOIN Pizza_Order_Product POP
                ON P.order_id = POP.order_id
                WHERE P.client_name = :name';

        $query = $db->prepare($sql);

        $array = [
        ':name' => $_SESSION['User']
        ];

        $succes = $query->execute($array);

        if($succes){
            if ($rij = $query->fetchAll()) { 
                foreach ($rij as $item) {
                    // Toegang tot kolommen binnen elke rij
                    $name = $item['client_name'];
                    $order = $item['product_name'];
                    $quantity = $item['quantity'];
                    $status = $item['status'];


                    switch ($status) {
                        case "1":
                          $status = "Your Order is being processed.";
                          break;
                        case "2":
                          $status = "Your order is in progress and will be ready soon.";
                          break;
                        case "3":
                          $status = "Your order is on the way!";
                          break;
                        default:
                          $status = "No status available";
                      }



                    // Print de waarden
                    echo "<div> <p> Name: " . $name . "<br>";
                    echo "Product: " . $order . "<br>";
                    echo "Quantity: " . $quantity . "<br>";
                    echo "Status: " . $status . "</p> </div> <br>";
                }
                }
            } 
        }
    else{
        echo "<div> <p> Geen gegevens gevonden, log eerst in. </p> </div>";
    }
} 

function overzicht(){
$html = '';

    if(isset($_SESSION['Personnel'])){
        $html = '<ul>
                <li><a href="bestellingenOverzicht.php"> 📖 Overzicht </a></li>
            </ul>';
            echo $html;
    } else{
        $html = '<ul>
                <li><a href="index.php">🍕 MENU </a></li>
                <li><a href="winkelmand.php">🛒 WINKELMAND </a></li>
                <li><a href="profiel.php">👤 PROFIEL </a></li>
            </ul>';

    }
}

function overzichtBestellingen(){
    if(isset($_SESSION['Personnel'])){
        $db = maakVerbinding();

        $sql = 'SELECT P.order_id, P.client_name, P.personnel_username, P.datetime, P.status, P.address, POP.product_name, POP.quantity
                FROM Pizza_Order P INNER JOIN Pizza_Order_Product POP
                ON P.order_id = POP.order_id
                WHERE P.status != 3';

        $query = $db->prepare($sql);

        $succes = $query->execute();

        if($succes){
            if ($rij = $query->fetchAll()) { 
                foreach ($rij as $item) {
                    // Toegang tot kolommen binnen elke rij
                    $orderId = $item['order_id'];
                    $clientName = $item['client_name'];
                    $personnelName = $item['personnel_username'];
                    $dateTime = $item['datetime'];
                    $status = $item['status'];
                    $address = $item['address'];
                    $order = $item['product_name'];
                    $quantity = $item['quantity'];


                    switch ($status) {
                        case "1":
                          $status = "Your Order is received.";
                          break;
                        case "2":
                          $status = "Your order is in progress and will be ready soon.";
                          break;
                        case "3":
                          $status = "Your order is on the way!";
                          break;
                        default:
                          $status = "No status available";
                      }


                    // Print de waarden
                    echo "<div> <p> OrderID: " . $orderId . "<br>";
                    echo "Client Name: " . $clientName . "<br>";
                    echo "Personnel Name: " . $personnelName . "<br>";
                    echo "Time: " . $dateTime . "<br>";
                    echo "Address: " . $address . "<br>";
                    echo "Product: " . $order . "<br>";
                    echo "Quantity: " . $quantity . "<br>";
                    echo "<br>";
                    echo "Status: " . $status . "</p> <br>";
                    echo "<br>";
                    echo "<form method='post'>";
                        echo "<input type='hidden' name='order_id' value='" . $orderId . "'>";

                    echo "  <select name = 'status'>
                                <option value='1'> Order received </option>
                                <option value='2'> In progress </option>
                                <option value='3'> On the way</option>
                            </select>";
                    echo "<input name='update' type= 'submit' value='Update'>";
                    echo "</form> </div>";
                }
                }
            }
        }
    else {
        echo "Geen gegevens gevonden, log eerst in.";
    }
} 



// $_SESSION['winkelwagen'] = [
//     'item' => [
//         'item' => $item
//     ],
// ];