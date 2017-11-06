<?php
include_once('connexion.php'); // Inclusion de la connexion à MySQL
 
// Requête SQL
$sql = 'SELECT date_creation, titre, news FROM app_news ORDER BY date_creation DESC';
// On sélectionne les champs id_news et titre, qui sont les plus utiles
 
$query = mysql_query($sql, $dblink); // Envoi de la requête à la base de données
 
/* Etant donné que l'on aura plus d'un enregistrement dans la table,
il faut effectuer une boucle pour afficher tout les résultats.
Tant que l'on aura des enregistrements, on boucle,
on place dans la variable $fetch le résultat de mysql_fetch_array qui classe
dans un tableau les résultats ressortant de notre requête */
 
while($fetch=mysql_fetch_array($query))
{
      // On place en variables le résultat de chaque case du tableau
      $titre = $fetch['titre'];
      $news = StripSlashes($fetch['news']);
      /* Utilisation de la fonction StripSlashes()qui sert à supprimer 
       * les antislashs ajoutés devant les guillemets par 
       * mysql_real_escape_string() ( par précaution ) que l'on a utiliser 
       * auparavant dans l'ajout des enregistrements
       */
 
      /* Du fait que l'on a la date de création en format timestamp,
       * on utilise la fonction date(); qui permet de ressortir tout
       * les renseignements voulu.
       * Pour plus de détails sur les formats utiliser : http://fr3.php.net/date
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