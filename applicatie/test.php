<?php
require_once 'Library/bd.functions.php';
require_once './db_connectie.php';

$genre = isset($_GET['genrenaam']) ? $_GET['genrenaam'] : '';


// $sql = 'SELECT stuknr, titel, genrenaam, N.omschrijving, C.naam
// FROM Stuk S
// LEFT OUTER JOIN Niveau N ON S.niveaucode = N.niveaucode
// INNER JOIN Componist C ON S.componistId = C.componistId
// WHERE genrenaam LIKE \'' . $genre . '\'';

$sql = 'SELECT stuknr, titel, genrenaam, N.omschrijving, C.naam
FROM Stuk S
LEFT OUTER JOIN Niveau N ON S.niveaucode = N.niveaucode
INNER JOIN Componist C ON S.componistId = C.componistId
WHERE genrenaam LIKE  :genre';

$db = maakVerbinding();
//$dataset = $db -> query($sql);
$dataset = $db->prepare($sql);
$dataset->execute(
    [
        'genre' => $genre
    ]);
// var_dump($dataset);

?>

<body>
    <form action= "http://localhost:8080/test.php" method="get">
    <select name="genrenaam">
            <option value="Klassiek" <?= $gerne == 'Klassiek' ? 'selected' : '' ?>>Klassiek</option>
            <option value="Jazz" <?= $gerne == 'Jazz' ? 'selected' : '' ?>>Jazz </option>
            <option value="Pop" <?= $genre == 'Pop' ? 'selected' : '' ?>>Pop</option>
            <option value="Alles" <?= $gerne == 'Alles' ? 'selected' : '' ?>>Alles</option>
        </select>
        <input type="submit" value="zoek">
    </form>
    <?php
    //echo toonTabel('componist');
    echo toonTabelInhoud($dataset);

    ?>
</body>