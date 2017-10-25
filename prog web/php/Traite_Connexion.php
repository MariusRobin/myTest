<?php
    $Password = $_REQUEST["Password"];
    $Login=$_REQUEST["Login"];
    $url=$_REQUEST["url"];

    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique_web';
    $user = 'ETD';
    $password = 'ETD';
    if ($_SERVER['SERVER_NAME'] == "localhost")
    {
      $pdodsn = "dblib:version=7.0;charset=UTF-8;host=$host;dbname=$nomDb";//linux
    }
    else {
      $pdodsn = "sqlsrv:Server=$host;Database=$nomDb";//windows
    }
      $pdo = new PDO($pdodsn, $user, $password);
      $requete = "Select * from Abonné where Login ='".$Login."' and Password ='".$Password."'";

      $row = $pdo->query($requete);
      if ($pdo->query($requete) == null)
      {
        //session_start();
        //$_SESSION['NOM_USER'] = $row.['Nom_Abonne'];
        echo "<p> Connexion réussie </p>";
        //header("Location : ".$url);
      }
      else {
        echo "<p> Connexion echouée </p>";
      }
      $pdo = null;
?>
