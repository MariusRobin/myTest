<!doctype html>
<html>
<head>
<meta charset=\" utf-8\">
<title>Connexion</title>
</head>
<body>
  <?php
  $url = $_REQUEST['url'];
   ?>
  <h4> <a href="lesSessions.php"> < Retour </a> </h4>
  <form method="post" action="Traite_Connexion.php?url=<?php $url; ?>">
  <p>URL demandée : <?php echo $url; ?></p>
 	Nom : <input name="Login" type="text" required /><br/>
 	Mot de passe : <input name="Password" type="text" required /><br/>
 	<input name="Connect" type="submit" value="Connecter" />
     </form>
</html>
</body>
</html>
