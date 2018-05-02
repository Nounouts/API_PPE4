<?php
header('Content-Type: application/json');
require_once('bdd.php');


if(empty($_POST["id_user"])){
	echo"";
	header('http/1.1 403 Forbidden');
	return;
}


$requete = $db->prepare("SELECT interventions.id as id_inter, date_inter, time_inter, clients.firstname, clients.lastname, company, address1, address2, clients.zipcode, clients.city, clients.phone, motives.label as motive,  report, pending, duration
                          from interventions
                          inner join clients on clients.id = id_client
                          inner join motives on motives.id = id_motive
                          inner join employees on id_employee = employees.id
                          where employees.lastname ='$lastname' and date_inter >= getdate()  order by pending, date_inter DESC ");


$request->execute();
$result=$request->fetchAll();


$retour["nb"] = count($result);
$retour["list_inter"] = $result;


echo json_encode($retour);


?>