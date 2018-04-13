<?php
header('Content-Type: application/json');
require_once('bdd.php');


if(empty($_POST["id_user"])){
	echo"";
	header('http/1.1 403 Forbidden');
	return;
}

$request = $pdo->prepare("SELECT intervention.id, intervention.date, intervention.commentaire, intervention.etat_intervention, client.nom, client.prenom, client.adresse, client.ville, client.codepostal, client.telephone, client.entreprise FROM intervention , employe, client  WHERE intervention.id_employe = employe.id AND employe.id = :id_user AND client.id = intervention.id_client;");

$request->bindParam(':id_user',$_POST["id_user"]);

$request->execute();
echo 'test';
$result=$request->fetchAll();
$retour["nb"] = count($result);
$retour["list_inter"] = $result;


echo json_encode($retour);


?>