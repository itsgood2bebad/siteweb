<?php
include_once('connexion.php'); // connexion à MySQL
 
// Requête SQL
$sql = 'SELECT date_creation, titre, news FROM app_news ORDER BY date_creation DESC';

 
$query = mysql_query($sql, $dblink); // Envoi de la requête à la base de données
 

 
while($fetch=mysql_fetch_array($query))
{
      
      $titre = $fetch['titre'];
      $news = StripSlashes($fetch['news']);
      // Utilisation de la fonction StripSlashes()qui sert à supprimer 
       
 
      
 
      $date = date('d/m/Y', $fetch['date_creation']);
      $heure = date('H:i:s', $fetch['date_creation']);
 
      // Affichage
      echo '<strong>'.$titre.'</strong> ajouté le '.$date.' à '.$heure;
      echo $news;
      echo '<br /><br />';
}
 
mysql_close($dblink); // Fermeture de la connexion 
?>
