<?php
include_once('connexion.php'); 
 

$sql = 'SELECT date_creation, titre, news FROM app_news ORDER BY date_creation DESC';
// On sélectionne les champs id_news et titre, qui sont les plus utiles
 
$query = mysql_query($sql, $dblink); 
while($fetch=mysql_fetch_array($query))
{
      
      $titre = $fetch['titre'];
      $news = StripSlashes($fetch['news']);
      /* Utilisation de la fonction StripSlashes()qui sert à supprimer 
       * les antislashs ajoutés devant les guillemets par 
       * mysql_real_escape_string() par précaution 
       */
 
      
 
      $date = date('d/m/Y', $fetch['date_creation']);
      $heure = date('H:i:s', $fetch['date_creation']);
 
      // Affichage
      echo '<strong>'.$titre.'</strong> ajouté le '.$date.' à '.$heure;
      echo $news;
      echo '<br /><br />';
}
 
mysql_close($dblink); // Fermeture de la connexion à la base de données
?>