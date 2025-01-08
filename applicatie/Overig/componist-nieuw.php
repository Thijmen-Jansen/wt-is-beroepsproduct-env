<?php

require_once('db_connectie.php');
require_once('Library/db.functions.php');

$fouten = [];

$componistId    = '';
    $naam           = '';
    $geboortedatum  = '';
    $schoolId       = '';

if(isset($_POST['wissen'])){
    $componistId    = '';
    $naam           = '';
    $geboortedatum  = '';
    $schoolId       = '';
}

if (isset($_POST['opslaan'])) {

    // 4 kolommen, dus ook 4 variabelen
    $componistId    = sanitize($_POST['componistId']);
    $naam           = sanitize($_POST['naam']);
    $geboortedatum  = sanitize($_POST['geboortedatum']);
    $schoolId       = sanitize($_POST['schoolId'], true);

    //}
    if(empty($geboortedatum)){
        $geboortedatum = null;
    }
    if(empty($schoolId)){
        $schoolId = null;
    }


    $melding = 'Gegevens worden nog niet verwerkt';

    $db = maakVerbinding();

    $sql = 'INSERT INTO componist (componistId, naam, geboortedatum, schoolId) 
    VALUES (:componistId, :naam, :geboortedatum, :schoolId)';

    $query = $db->prepare($sql);
    

   

    // Controleer velden op geldigheid
    // componist id (not null, numeric)
    if (empty($componistId)) {
        $fouten[] = 'componistId is verplicht om in te vullen.';
    }

    if (!is_numeric($componistId)) {
        $fouten[] = 'componistId moet een numerieke waarde zijn.';
    }

    // Naam (not null, text)
    if (empty($naam)) {
        $fouten[] = 'naam is verplicht om in te vullen.';
    }

    if (count($fouten) > 0) {
        // Fouten: maak een melding
        $melding = '<ul class="error">';

        foreach($fouten as $fout)
        {
            $melding .= '<li>'.$fout.'</li>';

        }
        $melding .= '</ul>';
    } else
    {
        $result = $query->execute(
            [
                'componistId' => $componistId,
                'naam'=> $naam,
                'geboortedatum'=> $geboortedatum,
                'schoolId'=> $schoolId
            ]
        );

        if($result){
            $melding = 'Alles is opgeslagen';
        } else {
            $melding = 'Er is iets mis gegaan';
        }
    }

} 
else {
 $melding = '';
}



?>


<html lang="nl"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componinst - nieuw</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link rel="stylesheet" href="styles-componist.css">
</head>

<body>
<form action="componist-nieuw.php" method="post">
        <label for="componistId">componistId</label>
        <input type="text" id="componistId" name="componistId" value="<?= $componistId ?>"><br>

        <label for="naam">naam</label>
        <input type="text" id="naam" name="naam" value = "<?= $naam ?>"><br>

        <label for="geboortedatum">geboortedatum</label>
        <input type="date" id="geboortedatum" name="geboortedatum" value = "<?= $geboortedatum ?>"><br>

        <label for="schoolId">schoolId</label>
        <!-- <input type="text" id="schoolId" name="schoolId" value = "<?= $schoolId ?>"><br> -->
        <select name="schoolId" id="">
            <option value=" " selected>--GEEN--</option>
            <option value="4"<?= $schoolId == '4' ? 'selected' : '' ?>>4</option>
            <option value="8" <?= $schoolId == '8' ? 'selected' : '' ?>>8</option>

        </select>

        <input type="reset" id="reset" name="reset" value="wissen">
        <input type="submit" id="opslaan" name="opslaan" value="opslaan">    
    </form>
<?php echo $melding ?>


</body></html>