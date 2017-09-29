<!doctype html>
<html>
<head>
<meta charset=\" utf-8\">
<title>resultat</title>
</head>
<body>
  <h4> <a href="pageFormulaire.php"> < retour au formulaire</a> </h4>
  <h1>Resultat</h1>
  <?php
    $nombre1=$_GET[nombre1];
    if ($nombre1!=null)
    {
      $nombre2=$_GET[nombre2];
      echo $nombre1+$nombre2;
    }
    else {
      $nb1=$_POST[nombre1];
      $nb2=$_POST[nombre2];
      echo $nb1+$nb2;
    }
   ?>
</body>
</html>
