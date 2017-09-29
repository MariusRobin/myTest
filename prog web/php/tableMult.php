
<!doctype html>
<html>
<head>
  <meta charset=\" utf-8\">
  <title>Cours 1</title>
</head>
<body>
  <h4> <a href="cours1.php"> < retour </a> </h4>
  <h4> <a href="pageAcceuil.html.php"> Acceuil </a> </h4>

  <h1> Tables de multiplication </h1>
  <table border = 1>
    <?php
    echo "<td width = 50> </td>";
    for ($z=1; $z <=9 ; $z++) {
      echo "<td width = 50>".$z."</td>";
    }
    for ($i = 1; $i <= 9; $i++)
    {
      echo "<tr>";
      echo "<td>".$i."</td>";
      for ($j = 1; $j <= 9; $j++)
      {
        echo "<td width = 50>".$j*$i."</td>";
      }
      echo "</tr>";

    }
    ?>
  </table>
</table>
</body>
</html>
