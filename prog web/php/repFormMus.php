<!doctype html>
<html>
<head>
<meta charset=\" utf-8\">
<title>Musiciens correspondant à la recherche</title>
</head>
<body>
  <h4> <a href="formulaireMus.php"> < retour au formulaire</a> </h4>
  <h1>Musiciens correspondant à la recherche</h1>
  <?php

      $initiale=$_POST[initiale];

      echo "<p>Liste des musiciens dont le nom commence par ".$initiale." : </p>";
      $host = 'INFO-SIMPLET';
      $nomDb = 'Classique_web';
      $user = 'ETD';
      $password = 'ETD';
      $pdodsn = "dblib:version=7.0;charset=UTF-8;host=$host;dbname=$nomDb";
      // Connexion PDO
      $pdo = new PDO($pdodsn, $user, $password);
      $requete = "Select Nom_Musicien, Prénom_Musicien, Code_Musicien from Musicien Where Nom_Musicien Like '".$initiale."%' ";
      foreach ($pdo->query($requete) as $row) {
          echo 'Nom : ' . $row['Nom_Musicien']."<br>Prenom : ".$row['Prénom_Musicien']. "<br>";
          echo "<img src= image.php?code=".$row['Code_Musicien']."></img></br>";
          //echo "<a href=oeuvres.php?code=".$row['Code_Musicien']."> Liste des oeuvres </a><br>";
      }
      $pdo = null;

   ?>
</body>
</html>
