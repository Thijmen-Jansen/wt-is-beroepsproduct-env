<?php
session_start();
$logged_in = false;
$html = "";
//var_dump($_POST);
if (isset($_SESSION['username'])) {
  $html = "<h1>Welcome {$_SESSION['username']}</h1>";
  $logged_in = true;
} else{
  if(isset($_POST['username'])&& isset($_POST['password'])){
    if($_POST['username'] === 'Thijmen' && $_POST['password'] === "admin"){
      $_SESSION['username'] = $_POST['username'];
      $html = "<h1>Welcome {$_SESSION['username']}</h1>";
      header("Location: login.php"); // Voorkom dubbele POST
      exit;

    }
  } else {
    $logged_in = false;
  }
}


?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testsessie</title>
  </head>
  <body>
    <?php
    if ($logged_in) {
      echo $html;
    }
    ?>
    <!-- TODO: ongeldige waarde voor `action`. -->
    <form action="login.php" method="post">
      <input type="text" name="username">
      <input type="password" name="password">
      <input type="submit" value="login">
    </form>
    <a href="logout.php">Log uit</a>
  </body>
</html>
