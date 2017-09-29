 <!doctype html>
 <html>
 <head>
 <meta charset=\" utf-8\">
 <title>Liste musiciens B</title>
 </head>
 <body>
   <h4> <a href="TD5.php"> < retour </a> </h4>
   <h4> <a href="pageAcceuil.html.php"> Acceuil </a> </h4>
   <h1> Liste des musiciens</h1>
   <?php
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique_web';
    $user = 'ETD';
    $password = 'ETD';
    $pdodsn = "dblib:version=7.0;charset=UTF-8;host=$host;dbname=$nomDb";
    // Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);
    $requete = "Select Nom_Musicien, Prénom_Musicien from Musicien Where Nom_Musicien Like 'B%' ";
    foreach ($pdo->query($requete) as $row) {
        echo 'Nom : ' . $row['Nom_Musicien']."<br>Prenom : ".$row['Prénom_Musicien']. "<br>";
    }
    $pdo = null;
?>

 </body>
 </html>
