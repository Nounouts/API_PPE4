<?php

try{
	$bdd = new PDO('mysql:host=localhost;port=3306;dbname=ppe4-2;', 'root', 'apmq10',array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
	$retour["successbdd"] = true;
	$retour["messagebdd"] = "Connexion à la base de donnée réussie";
} catch(Exception $e){
	$retour["successbdd"] = false;
	$retour["messagebdd"] = "Connexion à la base de donnée impossible";
}
?>
