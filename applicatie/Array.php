<?php
$eenTMTien = [1,2,3,4,5,6,7,8,9,10];
$zesTMVijftien = [6,7,8,9,10,11,12,13,14,15];
$merge = array_merge($eenTMTien, $zesTMVijftien);
$film = ['titel' =>'hoi', 'jaar' =>'hoi2', 'regisseur'=>'hallo', 'hoofdrolspelers' =>'hallootjes'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
//    var_dump($eenTMTien);
//    var_dump($zesTMVijftien); 
   var_dump($merge);
   var_dump($film); 



   ?>
</body>
</html>