<?php
  $code = $_GET[code];
  $host = 'INFO-DORMEUR';
  $nomDb = 'Classique_web';
  $user = 'ETD';
  $password = 'ETD';
  $pdodsn = "dblib:version=7.0;charset=UTF-8;host=$host;dbname=$nomDb";
  // Connexion PDO
  $pdo = new PDO($pdodsn, $user, $password);
  $requete = "Select Photo from Musicien Where Code_Musicien Like '".$code."' ";
  foreach ($pdo->query($requete) as $row) {
      echo $row["Photo"];
  }
  $pdo = null;
 ?>
