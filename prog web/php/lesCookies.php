
 <!doctype html>
 <html>
 <head>
 <meta charset=\" utf-8\">
 <title>Cookies</title>
 </head>
 <body>
   <h4> <a href="index.php"> Acceuil </a> </h4>
   <h4> <a href="TD8.php"> < Retour </a> </h4>
   <h1> Cookies </h1>
   <?php
    $expire=time()+60*60*24;
    setcookie("nom",$_COOKIE["nom"]+1,$expire);

      if (isset($_COOKIE["nom"])) {
        echo "<p> Un cookie a été envoyé</p>" ;
        echo "<p> Son nom est : nom </p>" ;
        $val = $_COOKIE["nom"];
        echo "<p> C'est la :\" $val \" fois que vous visitez cette page ! </p>" ;
      }
      ?>
       <p><a href="lesCookies.php">Suite</a></p>
</html>
 </body>
 </html>
