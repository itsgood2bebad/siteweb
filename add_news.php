<?php
include_once ('connexion.php');

$ok  = NULL;
$ok =$_GET['ok'];
if (!empty($ok) && isset ($ok)) //isset — Détermine si une variable est définie 
	{								//et est différente de NULL
									//empty case vide
$titre = $_POST['titre'] ;
$news = mysql_real_escape_string($_POST['news'],$dblink); //Fonction protection 
														 //caractere speciaux
	$date_creation = time();
	$sql = "INSERT INTO 'app new' VALUES('','$titre','$date_creation','$news')";
	$query = mysql_query($sql,$dblink); //envoi requete base de donnés
	}
	unset($ok);
	mysql_close($dblink);

	else
{
// Sinon on affiche le formulaire
/* Explication brève du formulaire : déclaration d'un formulaire avec la balise form,
on renvoi la variable ok avec une valeur quelconque, ici 1 */
?>
<form method="post" action="ajout_news.php?ok=1" name="form_news">
Titre : <input name="titre" type="text" value="" />
<br/> News : <textarea name="news" rows="30" cols="85"></textarea>
<br/> <input type="submit" value="Ajouter la news" />
</form>
<?php
}
?>



