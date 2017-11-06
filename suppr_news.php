<?php
include_once('connexion.php'); 

$ok = NULL; 
$ok = $_GET['ok'];
 

if(!empty($ok) && isset($ok))
{

 $id_news = $_GET['id_news'];
 
 
 $sql = "DELETE FROM app_news WHERE id_news = "'.$id_news.'"";
 $query = mysql_query($sql, $dblink); 
 
 unset($ok); // On supprime la variable
}
else
{
  $sql = 'SELECT id_news, titre FROM app_news';
  $query = mysql_query($sql, $dblink); 
 
  while($fetch=mysql_fetch_array($query))
  {
      
      $titre = $fetch['titre'];
      $id_news = $fetch['id_news'];
 
      // Affichage
      echo '<a href="suppr_news.php?id_news='.$id_news.'&ok=1">'.$titre.'</a>';
  }
}
mysql_close($dblink); // Fermeture de la connexion à la base de données
?>
