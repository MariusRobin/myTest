<?php
  $code = $_GET['code'];
  $host = 'INFO-DORMEUR';
  $nomDb = 'Classique_web_2017';
  $user = 'ETD';
  $password = 'ETD';
  if ($_SERVER['SERVER_NAME'] == "localhost")
  {
    $pdodsn = "dblib:version=7.0;charset=UTF-8;host=$host;dbname=$nomDb";//linux
  }
  else {
    $pdodsn = "sqlsrv:Server=$host;Database=$nomDb";//windows
  }
  // Connexion PDO
  $pdo = new PDO($pdodsn, $user, $password);
  $requete = "Select Photo from Musicien Where Code_Musicien Like '".$code."' ";
  header("Content-Type: image/jpeg");
  foreach ($pdo->query($requete) as $row) {
      echo $row["Photo"];
  }
  $pdo = null;
 ?>
