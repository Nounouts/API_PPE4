<?php

try{
	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=ppe4-2;', 'root', 'apmq10');
	$retour["successbdd"] = true;
	$retour["messagebdd"] = "Connexion à la base de donnée réussie";
} catch(Exception $e){
	$retour["successbdd"] = false;
	$retour["messagebdd"] = "Connexion à la base de donnée impossible";
}
?>