
<!doctype html>
<html>
<head>
  <meta charset=\" utf-8\">
  <title>page Formulaire</title>
</head>
<body>
  <h4> <a href="TD5.php"> < retour </a> </h4>
  <h4> <a href="pageAcceuil.html.php"> Acceuil </a> </h4>
  <h1> Recherche d'un musicien</h1>
  <form method="post" action="repFormMus.php">
    <p>
      <label for="initiale">Initiale : </label>
      <input name="initiale" id="initiale" type="text" required /><br/>
    </p>
    <input type="submit" value="Rechercher" />
  </form>

</body>
</html>
