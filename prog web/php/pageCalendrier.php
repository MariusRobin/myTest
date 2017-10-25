
<!doctype html>
<html>
<head>
  <meta charset=\" utf-8\">
  <title>Calendrier</title>
</head>
<body>
  <h4> <a href="cours2.php"> < retour </a> </h4>
  <h4> <a href="index.php"> Acceuil </a> </h4>
  <h1>Calendrier </h1>
  <?php
  date_default_timezone_set('Europe/Paris');
  echo "<p>Date d'aujourd'hui : ".date('l jS \of F Y h:i:s A')." !</p>";
  echo "<p>Mois d'aujourd'hui : ".date('F')." </p>";
  echo "<p>Nombre de jours dans le mois : ".date('t')." </p>";
  $tableauDesJours = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
  echo date('F');
  echo "<table border=1>";
  echo "<tr>";
  for ( $i=0; $i<7;$i++)
  {
    echo "<td width=100>".$tableauDesJours[$i]."</td>";
  }
  echo "</tr>";
  echo "<tr>";
  $decalage;
  $numJour = date('j');
  for ($x=0;$x<7;$x++)
  {
    if (date('l')==$tableauDesJours[$x])
    {
      $decalage=$x;
    }
  }

  while ($numJour>7){
    $numJour=$numJour-7;
  }
  $i=1;
  $j=1;
  for ($i;$i<=$numJour-$decalage;$i++)
  {
    echo "<td width=100> 0 </td>";
  }
  for ($i;$i<=date('t')+$numJour;$i++)
  {
    echo "<td width=100>".$j."</td>";
    if ($i%7==0)
    {
      echo "</tr> <tr>";
    }
    $j++;
  }
  ?>
</body>
</body>
</html>
