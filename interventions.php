<?php
header('Content-Type: application/json');
include 'bdd.php';


if(empty($_POST["id_user"])){
	echo"";
	header('http/1.1 403 Forbidden');
	return;
}

$request = $pdo->prepare("SELECT intervention.id, intervention.date_intervention, intervention.commentaire, intervention.etat_intervention, client.nom, client.prenom, client.adresse, client.ville, client.codepostal, client.telephone FROM intervention, client, employe WHERE id_user = :id_user AND client.id = intervention.id_client AND intervention.id_employe = employe.id_user ORDER BY intervention.date_intervention");

$request->bindParam(':id_user',$_POST["id_user"]);

$request->execute();

$result=$request->fetchAll();

$retour["nb"] = count($result);
$retour["list_inter"] = $result;


echo json_encode($retour);


?>