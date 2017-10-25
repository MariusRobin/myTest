
<!doctype html>
<html>
<head>
  <meta charset=\" utf-8\">
  <title>page Formulaire</title>
</head>
<body>
  <h4> <a href="TD6.php"> < retour </a> </h4>
  <h4> <a href="index.php"> Acceuil </a> </h4>
  <h1> Insérer un abonné</h1>
  <form method="post" action="insererAbonne.php">

    <p>
      <label for="nom">Nom : </label>
      <input name="nom" id="nom" type="text" required/><br/>
    </p>
    <p>
      <label for="prenom">Prénom : </label>
      <input name="prenom" id="prenom" type="text" required/><br/>
    </p>
    <p>
      <label for="login">Login : </label>
      <input name="login" id="login" type="text" required/><br/>
    </p>
    <p>
      <label for="password">Password : </label>
      <input name="password" id="password" type="text" required/><br/>
    </p>
    <input type="submit" value="Insérer" />
  </form>

</body>
</html>
