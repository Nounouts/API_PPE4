<?php
require_once('bdd.php');


$_POST['id_intervention'];
$_POST['commentaire'];
$_POST['etat_intervention'];


if (!empty($_POST['id_intervention']) && !empty($_POST['etat_intervention']) && !empty($_POST['commentaire'])) {
	$request = $pdo->prepare("UPDATE intervention SET intervention.commentaire = :commentaire, intervention.etat_intervention = :etat_intervention WHERE intervention.id = :id_intervention");
	$request->bindParam(':id_intervention',$_POST["id_intervention"]);
		$request->bindParam(':commentaire',$_POST["commentaire"]);
	$request->bindParam(':etat_intervention',$_POST["etat_intervention"]);
	$request->execute();
}
else{
	echo"";
	header('http/1.1 403 Forbidden');
}
?>