<?php
require_once 'db_connectie.php';

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
    for( $i = 0; $i < $dataset->columnCount(); $i++){
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