<?php
$date1=date_create("now");
$date2=date_create("2024-12-05");
$diff=date_diff($date2,$date1);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>PHP voorbeeld</title>
</head>
<body>
    <p>Het duurt nog

    <?php
    echo $diff->format("%R%a days");
    ?>
 tot Sinterklaas.
    </p>  
</body>
</html>