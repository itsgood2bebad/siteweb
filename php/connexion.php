<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$bdd = 'bdd_news';
//id connexion mysql

$dblink = mysql_connect($host ,$user,$password);
mysql_select_db($bdd,$dblink);
?>