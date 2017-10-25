<!doctype html>
<html>
<head>
  <meta charset=\" utf-8\">
  <title>Insertion d'un abonné</title>
</head>
<body>
  <h4> <a href="insertForm.php"> < retour au formulaire</a> </h4>
  <h1>Insertion d'un abonné</h1>
  <?php

  $nom =$_POST['nom'];
  $prenom =$_POST['prenom'];
  $login =$_POST['login'];
  $pass =$_POST['password'];

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
  $requete = "INSERT INTO Abonne (Nom_Abonne, Prenom_Abonne, Login, Password)
  VALUES ('".$nom."', '".$prenom."', '".$login."', '".$pass."')";
  $pdo->query($requete);
  echo "<p>L'abonné ".$nom." ".$prenom." a bien été inséré à la base.</p>";
  echo "<h2>Liste des abonnés après modification</h2>";
  $pdo = null;
  $pdo = new PDO($pdodsn, $user, $password);
  $requete = "Select Nom_Abonne, Prenom_Abonne, Code_Abonne, Login, Password from Abonne
  order by Code_Abonne DESC";
  echo "<ul>";
  foreach ($pdo->query($requete) as $row) {
    echo '<li> ------- Nom : ' . $row['Nom_Abonne']." ------ Prenom : ".$row['Prenom_Abonne']." ---- Login : ".$row['Login']." ----- Password : ".$row['Password']. "</li>";

  }
  echo "</ul>";
  $pdo = null;

  ?>
</body>
</html>
