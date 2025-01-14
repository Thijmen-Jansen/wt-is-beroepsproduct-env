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
        } else if (htmlspecialchars(trim(strip_tags($string))) == '') {
            return null;
        } else {
            return htmlspecialchars(trim(strip_tags($string)));
        }
    }
}

function ingelogdCheck()
{
    $html = '';

    if (isset($_SESSION['gebruiker'])) {
        $username = $_SESSION['gebruiker'];
        echo '' . $username . '';
        $html = '<a href="Login.php">Log uit</a>';
        echo $html;
    } else {
        $html = '<a href="Login.php">log in</a>';
        echo $html;
    }

}

function bestelItem($Item)
{
    $winkelwagen = [];

    $winkelwagen[] = $Item;
}



