<!doctype html>
<html>
<head>
<meta charset=\" utf-8\">
<title>Page1ou2</title>
</head>
<body>
<?php
$page = $_GET['page'];
if($page == 1)
{
  echo "<h4> <a href=\"page1ou2.php\"> < retour </a> </h4>";
  echo "<h1> Page 1 </h1>";
}
else
{
echo "<h4> <a href=\"page1ou2.php\"> < retour </a> </h4>";
  echo "<h1> Pas page 1 </h1>";
}
?>
</body>
</html>
