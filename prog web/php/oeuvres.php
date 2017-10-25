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
  $requete = "select Titre_Oeuvre from Oeuvre
  inner join Composer on Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
  inner join Musicien on Musicien.Code_Musicien = Composer.Code_Musicien
  where Musicien.Code_musicien =".$code;
  echo '<h4> <a href="formulaireMus.php"> < retour au formulaire</a> </h4>';
  echo "<h1>Liste des oeuvres :</h1>";
  $pasDoeuvre = true;
  foreach ($pdo->query($requete) as $row) {
      $pasDoeuvre = false;
      echo "<p>".$row["Titre_Oeuvre"]."</p>";
  }
if ($pasDoeuvre == true)
  {
    echo "<p>Aucune oeuvre n'est présente </p>";
  }
  $pdo = null;
 ?>
