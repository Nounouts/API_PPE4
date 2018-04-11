<?php
//header('Content-Type: application/json');
include 'bdd.php';


if (!empty($_POST["id_user"])){
	//Preparation de la requete
	$request = $pdo->prepare("SELECT id_user FROM employe WHERE id_user = :id_user");
	//Mise en place des params
	$request->bindParam(':id_user',$_POST["id_user"]);
	//Execution de la requete
	$request->execute();
	//récupération du résultat
	$response = $request->fetchAll();
	//récupération du count
	$count=count($response);

	if($count>0){
		$connexion="logintrue";
		echo $connexion."\n";
	}
	else{
		$connexion="loginfalse";
		echo $connexion."\n";
		header('http/1.1 401 Unauthorized');
	}
}
else{
	echo"";
	header('http/1.1 403 Forbidden');
}


//echo json_encode($retour);
?>