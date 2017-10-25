
 <!doctype html>
 <html>
 <head>
 <meta charset=\" utf-8\">
 <title>page Formulaire</title>
 </head>
 <body>
   <h4> <a href="cours1.php"> < retour </a> </h4>
   <h4> <a href="index.php"> Acceuil </a> </h4>
   <h1> Formulaire en Get</h1>
        <form method="get" action="resultat.php">
          <p>
            <label for="nombre1">Nombre 1 : </label>
            <input name="nombre1" id="nombre1" type="number" required="rentrer un chiffre" /><br/>
          </p>
          <p>
            <label for="nombre2">Nombre 2 : </label>
            <input name="nombre2" id="nombre2" type="number" required="rentrer un chiffre" /><br/>
          </p>
          <input type="submit" value="Calculer" />
        </form>

        <h1> Formulaire en Post</h1>
             <form method="post" action="resultat.php">
               <p>
                 <label for="nombre1">Nombre 1 : </label>
                 <input name="nombre1" id="nombre1" type="number" required="rentrer un chiffre" /><br/>
               </p>
               <p>
                 <label for="nombre2">Nombre 2 : </label>
                 <input name="nombre2" id="nombre2" type="number" required="rentrer un chiffre" /><br/>
               </p>
               <input type="submit" value="Calculer" />
             </form>

 </body>
 </html>
